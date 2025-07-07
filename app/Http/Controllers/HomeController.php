<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Auth as FirebaseAuth;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Inertia\Inertia;
use Google\Cloud\Firestore\FirestoreClient;

class HomeController extends Controller
{

    public function __construct() {}


    public function index(Request $request)
    {
        $firestore = app('firebase.firestore')->database();

        $data = [
            'users_count' => 0,
            'number_of_rooms' => 0,
            'number_of_posts' => 0,
            'number_of_proposals' => 0,
        ];

        // حساب عدد المستخدمين
        $usersCollection = $firestore->collection('users');
        $data['users_count'] = $usersCollection->documents()->size();  // عدد الوثائق في مجموعة المستخدمين

        // حساب عدد الغرف
        $roomsCollection = $firestore->collection('rooms');
        $data['number_of_rooms'] = $roomsCollection->documents()->size();  // عدد الوثائق في مجموعة الغرف

        // حساب عدد المنشورات
        $mediaCollection = $firestore->collection('media');
        $data['number_of_posts'] = $mediaCollection->documents()->size();  // عدد الوثائق في مجموعة المنشورات

        // حساب عدد المقترحات
        $proposalsCollection = $firestore->collection('proposals');
        $data['number_of_proposals'] = $proposalsCollection->documents()->size();  // عدد الوثائق في مجموعة المقترحات

        return view('page.dashboard')->with('data', $data);
    }
}
