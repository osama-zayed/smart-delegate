<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Factory;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $redirectTo = '/'; 
    protected $auth;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $path = base_path(env('FIREBASE_CREDENTIALS'));

        $this->auth = (new Factory)->withServiceAccount($path)->createAuth();
    }

    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function logout()
    {
        session()->forget(['firebase_id_token', 'user_name', 'user_email']);
        return redirect()->route('login')->with('message', 'تم تسجيل الخروج بنجاح');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        try {
            // تسجيل الدخول
            $signInResult = $this->auth->signInWithEmailAndPassword($validated['email'], $validated['password']);
            $idToken = $signInResult->idToken();
            $email = $validated['email'];
            $ID = explode('@', $email)[0];
    
            // Firestore
            $firestore = app('firebase.firestore')->database();
            $collection = $firestore->collection('users')->where('ID', '==', $ID)->documents();
            
            $data = [];
            foreach ($collection as $document) {
                if ($document->exists()) {
                    $userData = $document->data();
                    $data[] = [
                        'id' => $document->id(),
                        'first_name' => $userData['first_name'],
                        'role' => $userData['role'],
                    ];
                }
            }
            
            if (empty($data)) {
                flash()->error( 'المستخدم غير موجود في قاعدة البيانات');
                return back()->withErrors(['email' => 'المستخدم غير موجود في قاعدة البيانات']);
            }
    
            // تحقق من role
            $userData = $data[0]; // Assuming there's only one matching document
            if (isset($userData['role']) && $userData['role'] == 1) {
                // تخزين البيانات في الجلسة
                session([
                    'firebase_id_token' => $idToken,
                    'name' => $userData['first_name'] ?? 'مستخدم',
                    'email' => $validated['email'],
                ]);
                flash()->success('تم تسجيل الدخول بنجاح.');
                return redirect($this->redirectTo);
            } else {
                session()->forget(['firebase_id_token', 'name', 'email']);
                return back()->withErrors(['email' => 'غير مصرح لك بالدخول.']);
            }
        } catch (\Kreait\Firebase\Exception\Auth\AuthError $e) {
            flash()->error($e->getMessage());
            return back()->withErrors(['email' => $e->getMessage()]);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
            return back()->withErrors(['email' => $e->getMessage()]);
        }
    }
    
}
