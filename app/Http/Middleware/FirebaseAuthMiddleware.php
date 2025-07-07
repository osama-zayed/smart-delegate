<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\Auth\InvalidIdToken;
use Kreait\Firebase\Exception\Auth\ExpiredIdToken;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class FirebaseAuthMiddleware
{
    protected $auth;

    public function __construct()
    {
        $this->auth =  app('firebase.auth');
    }

    public function handle(Request $request, Closure $next)
    {
        $firebaseToken = session('firebase_id_token');
        if (!$firebaseToken) {
            return redirect()->route('showFormLogin');
        }

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($firebaseToken);
            return $next($request);
        } catch (FailedToVerifyToken $e) {
            flash()->error('Invalid email or password');
            return redirect()->route('showFormLogin')->withErrors(['Failed to verify token.']);
        } catch (\Exception $e) {
            flash()->error($e);
            return redirect()->route('showFormLogin')->withErrors(['Error verifying token.']);
        }
    }
}
