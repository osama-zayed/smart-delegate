<?php

namespace App\Traits;

use Google\Cloud\Firestore\FirestoreClient;
use Exception;

trait FirestoreHelperTrait
{
    /**
     * إنشاء اتصال بـ Firestore
     *
     * @return FirestoreClient
     * @throws Exception
     */
    public function initializeFirestore(): FirestoreClient
    {
        try {
            // استخدام Firebase Firestore
            $firestore = app('firebase.firestore')->database();
            return $firestore;
        } catch (Exception $e) {
            throw new Exception('Error initializing Firestore: ' . $e->getMessage());
        }
    }

    /**
     * إضافة مستند جديد إلى مجموعة Firestore
     *
     * @param string $collectionName
     * @param array $data
     * @return array
     */
    public function addDocument(string $collectionName, array $data): array
    {
        try {
            $firestore = $this->initializeFirestore();
            $collection = $firestore->collection($collectionName);
            $document = $collection->add($data);

            return [
                'status' => 'success',
                'message' => 'Document added successfully',
                'documentId' => $document->id(),
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * قراءة جميع المستندات من مجموعة Firestore
     *
     * @param string $collectionName
     * @return array
     */
    public function getAllDocuments(string $collectionName): array
    {
        try {
            // التحقق من وجود توكن Firebase في الجلسة
            $firebaseToken = session('firebase_id_token');
            if ($firebaseToken) {
                // التحقق من صحة التوكن باستخدام Firebase Auth
                $auth = app('firebase.auth');
                $verifiedIdToken = $auth->verifyIdToken($firebaseToken); // التحقق من صحة التوكن

                // إذا كان التوكن صالحًا، نستمر في قراءة المستندات
                $firestore = $this->initializeFirestore();
                $collection = $firestore->collection($collectionName);
                $documents = $collection->documents();
                $data = [];

                foreach ($documents as $document) {
                    if ($document->exists()) {
                        $data[] = [
                            'id' => $document->id(),
                            'data' => $document->data(),
                        ];
                    }
                }

                return [
                    'status' => 'success',
                    'data' => $data,
                ];
            } else {
                // إذا لم يكن هناك توثيق للمستخدم
                return redirect()->route('showFormLogin');
            }
       
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * قراءة مستند معين من مجموعة Firestore
     *
     * @param string $collectionName
     * @param string $documentId
     * @return array
     */
    public function getDocument(string $collectionName, string $documentId): array
    {
        try {
            $firestore = $this->initializeFirestore();
            $document = $firestore->collection($collectionName)->document($documentId)->snapshot();

            if ($document->exists()) {
                return [
                    'status' => 'success',
                    'data' => $document->data(),
                ];
            }

            return [
                'status' => 'error',
                'message' => 'Document not found',
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * تحديث مستند في مجموعة Firestore
     *
     * @param string $collectionName
     * @param string $documentId
     * @param array $data
     * @return array
     */
    public function updateDocument(string $collectionName, string $documentId, array $data): array
    {
        try {
            $firestore = $this->initializeFirestore();
            $firestore->collection($collectionName)->document($documentId)->set($data, ['merge' => true]);

            return [
                'status' => 'success',
                'message' => 'Document updated successfully',
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * حذف مستند من مجموعة Firestore
     *
     * @param string $collectionName
     * @param string $documentId
     * @return array
     */
    public function deleteDocument(string $collectionName, string $documentId): array
    {
        try {
            $firestore = $this->initializeFirestore();
            $firestore->collection($collectionName)->document($documentId)->delete();

            return [
                'status' => 'success',
                'message' => 'Document deleted successfully',
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
}
