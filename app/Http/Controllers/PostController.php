<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $firestore = app('firebase.firestore')->database();
        $collection = $firestore->collection('media');
        $data = [];
        foreach ($collection->documents() as $document) {
            if ($document->exists()) {
                $roomData = $document->data();
                $data[] = [
                    'id' => $document->id(),
                    "content" => $roomData['content']??'',
                    "mediaId" => $roomData['mediaId']??'',
                    "createdId" =>$roomData['createdId']??'',
                    "mediaType" =>$roomData['mediaType']??'',
                    "deadline" => $roomData['deadline'] ??'',
                    "isAssignment" => $roomData['isAssignment']??'',
                    "roomId" => $roomData['roomId']??'',
                    "timestamp" => $roomData['timestamp']??'',

                ];
            }
        }
        return view("page.posts.index", [
            'posts' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        // التحقق من البيانات المدخلة
        $validatedData = $request->validated();

        // الحصول على خدمة Firestore
        $firestore = app('firebase.firestore')->database();

        // التحقق من رفع صورة
        $imageName = null;
        if ($request->hasFile('image')) {
            // الحصول على الصورة
            $image = $request->file('image');
            // إنشاء اسم فريد للصورة
            $imageName = time() . '.' . $image->getClientOriginalExtension();
        }
        $timestamp = now()->toDate();
        try {
            // إضافة البيانات إلى Firestore
            $userRef = $firestore->collection('media')->add([
                'mediaId' => null,
                'mediaType' => 'text', // أو يمكنك تعديله حسب نوع البيانات
                'content' => $validatedData['content'],
                'createdId' => null, // يمكن ملئه بناءً على احتياجاتك
                'roomId' => null,    // يمكن ملئه بناءً على احتياجاتك
                'timestamp' => $timestamp,
                'fileURL' => $imageName, // رابط الصورة
                'options' => null,  // يمكن ملئه بناءً على احتياجاتك
                'isAssignment' => null,  // بناءً على احتياجاتك
                'deadline' => null, // بناءً على احتياجاتك
            ]);

            // إذا تمت العملية بنجاح، عرض رسالة نجاح
            flash()->success('Post added successfully to Firebase.');
            return redirect()->route('post.index')->with('success', 'Post added successfully to Firebase.');
        } catch (\Exception $e) {
            // في حالة حدوث خطأ
            flash()->error('Failed to add post to Firebase: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to add post to Firebase: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // الاتصال بـ Firestore
            $firestore = app('firebase.firestore')->database();
            $collection = $firestore->collection('media');

            // التحقق من وجود المستند ثم حذفه
            $document = $collection->document($id);
            if ($document->snapshot()->exists()) {
                $document->delete();
                flash()->success('post deleted successfully.');
                return redirect()->route('posts.index')->with('success', 'post deleted successfully.');
            } else {
                flash()->error('post not found.');
                return redirect()->route('posts.index')->with('error', 'post not found.');
            }
        } catch (\Exception $e) {
            flash()->error('An error occurred: ' . $e->getMessage());
            return redirect()->route('posts.index')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
