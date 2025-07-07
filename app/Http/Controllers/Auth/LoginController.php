<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Factory;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $redirectTo = '/'; // الصفحة التي يتم التحويل إليها بعد النجاح في تسجيل الدخول
    protected $auth;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $path = base_path('storage/firebase/firebase.json');

        // تهيئة Firebase Auth
        $this->auth = (new Factory)->withServiceAccount($path)->createAuth();
    }

    // عرض نموذج تسجيل الدخول
    public function showFormLogin()
    {
        return view('auth.login');
    }

    // عملية تسجيل الدخول
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {
            // التحقق من المستخدم باستخدام Firebase
            $signInResult = $this->auth->signInWithEmailAndPassword($validated['email'], $validated['password']);
            $idToken = $signInResult->idToken();
            // تخزين ID Token في الجلسة أو تخزينه في ملفات تعريف الارتباط
            session(['firebase_id_token' => $idToken]);

            return redirect($this->redirectTo); // التحويل بعد النجاح في تسجيل الدخول
        } catch (\Kreait\Firebase\Exception\Auth\AuthError $e) {
            return back()->withErrors([
                'email' => $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return back()->withErrors([
                'email' => $e->getMessage(),
            ]);
        }
    }
}
