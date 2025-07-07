<?php

namespace App\Http\Controllers;

use App\Traits\FirestoreHelperTrait;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Firestore;

class TestController extends Controller
{
    use FirestoreHelperTrait;

    public function testFirestore()
    {
        try {
      
            // $factory = (new Factory)->withServiceAccount(env('FIREBASE_CREDENTIALS'));
            // $firestore = $factory->createFirestore();
            // $firestore->collection('users')->document('user1')->set([
            //     'name' => 'John Doe',
            //     'email' => 'john.doe@example.com'
            // ]);
            // $snapshot = $firestore->collection('users')->get();
            // foreach ($snapshot->documents() as $document) {
            //     $data = $document->data();
            //     // ...
            // }
            // تهيئة Firestore

            // $snapshot = $this->getAllDocuments('available_rooms');
            // $ = $firestore->collection();
            // $documents = $collection->documents();
            // $firestore = app('firebase.firestore')->database();
            // $collection = $firestore->collection('notifications');
            dd($snapshot);
            $document = $collection->add([
                'available_end_time' => '18:00', // وقت نهاية التوفر
                'available_start_time' => '08:00', // وقت بدء التوفر
                'day' => 'Monday', // اليوم
                'roomname' => 'Room A', // اسم الغرفة
            ]);

            dd($document);
            // $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                if ($document->exists()) {
                    printf('Document data for document %s:' . PHP_EOL, $document->id());
                    print_r($document->data());
                    printf(PHP_EOL);
                } else {
                    printf('Document %s does not exist!' . PHP_EOL, $document->id());
                }
            }
            // dd($documents);

            // يجمع أسماء المجموعات
            // $collections = [];
            // foreach ($firestoreClient->listCollectionIds() as $collectionId) {
            //     $collections[] = $collectionId;
            // }

            // إرجاع الاستجابة كـ JSON
            return response()->json([
                'status' => 'success',
                'collections' => $collections,
            ]);
        } catch (\Exception $e) {
            // معالجة الأخطاء وإرجاعها كـ JSON
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    // public function testFirebase(Request $request)
    // {
    //     $database = $this->initializeFirebase();

    //     // تحديد المرجع (المسار) داخل قاعدة البيانات
    //     $reference = $database->getReference(path: 'users');
    //     $readResult = $this->readFromFirebase($reference);
    //     dd($readResult);
    //     // إضافة أو تحديث بيانات
    //     $addResult = $this->addToFirebase('contacts', ['connection' => true]);
    //     if ($addResult['status'] === 'error') {
    //         return response()->json($addResult, 500);
    //     }

    //     // قراءة البيانات
    //     $readResult = $this->readFromFirebase('contacts');
    //     if (isset($readResult['status']) && $readResult['status'] === 'error') {
    //         return response()->json($readResult, 500);
    //     }

    //     // تعديل بيانات
    //     $updateResult = $this->updateFirebase('contacts', ['connection' => false]);
    //     if ($updateResult['status'] === 'error') {
    //         return response()->json($updateResult, 500);
    //     }

    //     // حذف بيانات
    //     // $deleteResult = $this->deleteFromFirebase('contacts');
    //     // if ($deleteResult['status'] === 'error') {
    //     //     return response()->json($deleteResult, 500);
    //     // }

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'All operations completed successfully',
    //     ], 200);
    // }
}
