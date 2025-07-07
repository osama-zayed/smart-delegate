<?php

namespace App\Traits;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use Exception;

trait FirebaseHelperTrait2
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
            ->withDatabaseUri(env('FIREBASE_DATABASE_URI', 'https://ben-ali-perfume-default-rtdb.firebaseio.com'))
            ->createDatabase();
    }

    /**
     * إضافة أو تحديث بيانات في مسار معين
     *
     * @param string $referencePath
     * @param array $data
     * @return mixed
     */
    public function addToFirebase(string $referencePath, array $data)
    {
        try {
            $database = $this->initializeFirebase();
            $reference = $database->getReference($referencePath);
            $newKey = $reference->push($data)->getKey();
            return [
                'status' => 'success',
                'message' => 'Data added successfully',
                'newKey' => $newKey,
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
    public function addOrUpdateFirebase(string $referencePath, array $data)
    {
        try {
            $database = $this->initializeFirebase();
            $reference = $database->getReference($referencePath);
            $reference->set($data);
            return [
                'status' => 'success',
                'message' => 'Data added/updated successfully',
                'data' => $reference->getSnapshot()->getValue(),
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * قراءة البيانات من Firebase
     *
     * @param string $referencePath
     * @return mixed
     */
    public function readFromFirebase(string $referencePath)
    {
        try {
            $database = $this->initializeFirebase();
            $reference = $database->getReference($referencePath);
            return $reference->getSnapshot()->getValue();
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * حذف بيانات من Firebase
     *
     * @param string $referencePath
     * @return mixed
     */
    public function deleteFromFirebase(string $referencePath)
    {
        try {
            $database = $this->initializeFirebase();
            $reference = $database->getReference($referencePath);
            $reference->remove();
            return [
                'status' => 'success',
                'message' => 'Data deleted successfully',
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * تعديل بيانات محددة في Firebase
     *
     * @param string $referencePath
     * @param array $data
     * @return mixed
     */
    public function updateFirebase(string $referencePath, array $data)
    {
        try {
            $database = $this->initializeFirebase();
            $reference = $database->getReference($referencePath);
            $reference->update($data);
            return [
                'status' => 'success',
                'message' => 'Data updated successfully',
                'data' => $reference->getSnapshot()->getValue(),
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
}
