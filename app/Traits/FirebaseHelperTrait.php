<?php

namespace App\Traits;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use Exception;

trait FirebaseHelperTrait
{
    /**
     * إنشاء اتصال بـ Firebase Database
     *
     * @return Database
     * @throws Exception
     */
    public function initializeFirebase(): Database
    {
        $path = base_path(env('FIREBASE_CREDENTIALS'));

        if (!file_exists($path)) {
            throw new Exception('Firebase configuration file not found.');
        }

        return (new Factory)
            ->withServiceAccount($path)
            ->createDatabase();
    }

    /**
     * إضافة أو تحديث بيانات في Firebase
     *
     * @param string $referencePath
     * @param array $data
     * @param bool $overwrite
     * @return array
     */
    public function saveToFirebase(string $referencePath, array $data, bool $overwrite = false): array
    {
        try {
            $database = $this->initializeFirebase();
            $reference = $database->getReference($referencePath);

            if ($overwrite) {
                $reference->set($data);
            } else {
                $newKey = $reference->push($data)->getKey();
                return $this->response('success', 'Data added successfully', ['newKey' => $newKey]);
            }

            return $this->response('success', 'Data saved successfully', $reference->getSnapshot()->getValue());
        } catch (Exception $e) {
            return $this->response('error', $e->getMessage());
        }
    }

    /**
     * قراءة البيانات من Firebase
     *
     * @param string $referencePath
     * @return array|mixed
     */
    public function readFromFirebase(string $referencePath)
    {
        try {
            $database = $this->initializeFirebase();
            $reference = $database->getReference($referencePath);
            return $reference->getSnapshot()->getValue();
        } catch (Exception $e) {
            return $this->response('error', $e->getMessage());
        }
    }

    /**
     * تعديل بيانات محددة في Firebase
     *
     * @param string $referencePath
     * @param array $data
     * @return array
     */
    public function updateFirebase(string $referencePath, array $data): array
    {
        try {
            $database = $this->initializeFirebase();
            $reference = $database->getReference($referencePath);
            $reference->update($data);
            return $this->response('success', 'Data updated successfully', $reference->getSnapshot()->getValue());
        } catch (Exception $e) {
            return $this->response('error', $e->getMessage());
        }
    }

    /**
     * حذف بيانات من Firebase
     *
     * @param string $referencePath
     * @return array
     */
    public function deleteFromFirebase(string $referencePath): array
    {
        try {
            $database = $this->initializeFirebase();
            $reference = $database->getReference($referencePath);
            $reference->remove();
            return $this->response('success', 'Data deleted successfully');
        } catch (Exception $e) {
            return $this->response('error', $e->getMessage());
        }
    }

    /**
     * التحقق من اتصال Firebase
     *
     * @return array
     */
    public function checkFirebaseConnection(): array
    {
        try {
            $database = $this->initializeFirebase();
            $reference = $database->getReference('/');
            $reference->getValue(); // محاولة الوصول للقاعدة
            return $this->response('success', 'Firebase connection is valid.');
        } catch (Exception $e) {
            return $this->response('error', $e->getMessage());
        }
    }

    /**
     * إنشاء استجابة موحدة
     *
     * @param string $status
     * @param string $message
     * @param mixed $data
     * @return array
     */
    private function response(string $status, string $message, $data = null): array
    {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
}
