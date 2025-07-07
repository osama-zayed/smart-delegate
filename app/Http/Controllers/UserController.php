<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Http;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Firestore;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $firestore = app('firebase.firestore')->database();
        $collection = $firestore->collection('users');
        $data = [];
        foreach ($collection->documents() as $document) {
            if ($document->exists()) {
                $roomData = $document->data();
                $data[] = [
                    'id' => $document->id(),
                    'data' => $roomData,
                ];
            }
        }
        return view("page.user.index", [
            'users' => $data
        ]);
    }

    public function create()
    {
        return view("page.user.create");
    }

    /**
     * Store a newly created resource in storage.
     */

    
     
    
     public function store(UserStoreRequest $request)
     {
         // البيانات بعد التحقق من الصحة
         $validatedData = $request->validated();
     
         // الحصول على خدمة Firebase
         $auth = app('firebase.auth');
         $firestore = app('firebase.firestore')->database();
     
         // بداية الترانزاكشن
         DB::beginTransaction();
     
         try {
             // تحويل الـ ID إلى بريد إلكتروني مؤقت
             $email = $validatedData['id'] . '@customdomain.com';
     
             // إنشاء مستخدم جديد باستخدام البريد الإلكتروني وكلمة المرور
             $newUser = $auth->createUserWithEmailAndPassword(
                 $email,    // البريد الإلكتروني المحول
                 $validatedData['phone']  // كلمة المرور من الفورم
             );
     
             // تخزين باقي المعلومات في Firestore مع إضافة الـ "ID" كحقل
             $userRef = $firestore->collection('users')->document($newUser->uid);
             
             $userRef->set([
                 'ID' => $validatedData['id'],
                 'first_name' => $validatedData['first_name'],
                 'last_name' => $validatedData['last_name'],
                 'phone' => $validatedData['phone'],
                 'address' => $validatedData['address'] ?? '',
                 'email' => $validatedData['email'] ?? $email,
                 'role' => $validatedData['role'],
                 'year' => $validatedData['year'],
                 'Department' => $validatedData['department']
             ]);
     
             // إذا تمت جميع العمليات بنجاح، نقوم بتأكيد الترانزاكشن
             DB::commit();
     
             flash()->success('User added successfully to Firebase.');
             return redirect()->route('user.index')->with('success', 'User added successfully to Firebase.');
     
         } catch (\Exception $e) {
             // في حالة حدوث خطأ نقوم بالتراجع عن الترانزاكشن
             DB::rollBack();
     
             flash()->error('Failed to add user to Firebase: ' . $e->getMessage());
             return redirect()->back()->with('error', 'Failed to add user to Firebase: ' . $e->getMessage());
         }
     }
     

     

    /**
     * Display the specified resource.
     */

    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
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
            $collection = $firestore->collection('users');

            // التحقق من وجود المستند ثم حذفه
            $document = $collection->document($id);
            if ($document->snapshot()->exists()) {
                $document->delete();
                flash()->success('user deleted successfully.');
                return redirect()->route('user.index')->with('success', 'user deleted successfully.');
            } else {
                flash()->error('user not found.');
                return redirect()->route('user.index')->with('error', 'user not found.');
            }
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
