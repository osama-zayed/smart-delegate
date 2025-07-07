<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Kreait\Firebase\Exception\AuthException;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Support\Facades\Route;



Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showFormLogin'])->name('showFormLogin');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// 'firebase.auth'
Route::middleware([])->group(function () {
    // Dashboard Routes
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // User Management Routes
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::get('/Activity', [App\Http\Controllers\UserController::class, 'Activity'])->name('Activity');

    // Room Management Routes
    Route::resource('rooms', App\Http\Controllers\RoomController::class);

    // Content Management Routes
    Route::resource('posts', App\Http\Controllers\PostController::class);

    // Notification Routes
    Route::resource('notifications', App\Http\Controllers\NotificationController::class);

    // Questionnaire Routes
    Route::resource('proposals', App\Http\Controllers\ProposalController::class);

    // Settings Routes
    Route::get('/settings/profile', [App\Http\Controllers\SettingController::class, 'profile'])->name('settings.profile');
    Route::put('/settings/update-password', [App\Http\Controllers\SettingController::class, 'updatePassword'])->name('settings.password.update');

    // Search & Utility Routes
    Route::get('/search', [App\Http\Controllers\HomeController::class, 'searchById'])->name('searchById');
});






// Route::get('/', function () {
//     return view('Welcome'); // عرض صفحة الفورم
// });




Route::get('/test', [TestController::class, 'testFirestore']);
Route::get('/create-userf', function () {
    return view('create_userf'); // عرض صفحة الفورم
});

Route::post('/create-userf', function (Request $request) {
    // التحقق من صحة البيانات المدخلة
    $request->validate([
        'ID' => 'required|string',   // المعرف بدل البريد الإلكتروني
        'password' => 'required|min:6',
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'phone' => 'required|string',
        'address' => 'string|nullable',  // العنوان غير مطلوب
        'role' => 'required|string',
        'email' => 'string|nullable',    // البريد الإلكتروني غير مطلوب
        'year' => 'required|string',     // سنة الدراسة المطلوبة
        'Department' => 'required|string' // القسم مطلوب

    ]);

    // إعداد الاتصال بـ Firebase
    $auth = app('firebase.auth');
    $firestore = app('firebase.firestore')->database();

    try {
        // تحويل الـ ID إلى بريد إلكتروني مؤقت
        $email = $request->input('ID') . '@customdomain.com';

        // إنشاء مستخدم جديد باستخدام البريد الإلكتروني وكلمة المرور
        $newUser = $auth->createUserWithEmailAndPassword(
            $email,    // البريد الإلكتروني المحول
            $request->input('password')  // كلمة المرور من الفورم
        );

        // تخزين باقي المعلومات في Firestore مع إضافة الـ "ID" كحقل
        $userRef = $firestore->collection('users')->document($newUser->uid);
        dd($userRef);
        $userRef->set([
            'ID' => $request->input('ID'), // تخزين الـ ID كحقل منفصل
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'), // العنوان قد يكون فارغًا
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'year' => $request->input('year'),       // تخزين سنة الدراسة
            'Department' => $request->input('Department') // تخزين القسم
        ]);

        // إعادة توجيه المستخدم مع رسالة نجاح
        return redirect()->back()->with('success', 'تم إنشاء المستخدم وتخزين المعلومات بنجاح!');
    } catch (AuthException $e) {
        return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء المستخدم: ' . $e->getMessage());
    } catch (FirebaseException $e) {
        return redirect()->back()->with('error', 'حدث خطأ في Firebase: ' . $e->getMessage());
    }
});
