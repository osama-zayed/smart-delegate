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

    public function __construct()
    {

    }


    public function index(Request $request)
    {

        // $firestore = app('firebase.firestore')->database();
        // $collection = $firestore->collection('rooms')->document('');
        // dd($collection);
        // // $documents = ;
        // $db = new FirestoreClient([
        //     'projectId' => env('FIREBASE_PROJECT_ID'),
        // ]);
        // $citiesRef = $db->collection('rooms')->documents();
        // # [START firestore_query_filter_not_eq]
        // # [END firestore_query_filter_not_eq]
        // dd($citiesRef);
        // foreach ($citiesRef->documents() as $document) {
        //     dd($document);
        // }

        // $data = [];
        // foreach ($collection->documents()as $document) {
        //     if ($document->exists()) {
        //         $data[] = [
        //             'id' => $document->id(),
        //             'data' => $document->data(),
        //         ];
        //     }
        // }
        // dd($data);
        // return response()->json($collection);
        $data = [
            'users_count' => 0,
            'number_of_rooms' => 0,
            'number_of_posts' => 0,
            'number_of_proposals' => 0,
        ];
        return view('page.dashboard')->with('data', $data);
    }
}




  // public function searchById()
    // {
    //     try {
    //         $searchTerm = request()->input('search');
    //         $users = Student::where('full_name', 'LIKE', '%' . $searchTerm . '%')
    //             ->orWhere('academic_id', $searchTerm)
    //             ->get();

    //         return view('page.searchResults', compact('users'));
    //     } catch (Exception $e) {
    //         toastr()->error('خطأ عند جلب البيانات');
    //         return redirect()->back();
    //     }
    // }
    // public function getStudentCountsBySpecialization()
    // {
    //     $studentCounts = DB::table('students')
    //         ->select('specializations.name', DB::raw('COUNT(*) as count'))
    //         ->join('specializations', 'students.specialization_id', '=', 'specializations.id')
    //         ->groupBy('specializations.name')
    //         ->get();

    //     return response()->json(['data' => $studentCounts]);
    // }
    // public function Notifications(Request $request)
    // {
    //     $user = auth()->user();
    //     if ($user->user_type == 'registration' || $user->user_type == 'control') {
    //         toastr()->error("غير مصرح لك");
    //         return redirect()->back();
    //     }
    //     try {
    //         $users = Student::query();
    //         if ($request['college_id'] != 0) {
    //             $users->where('college_id', $request['college_id']);
    //         }
    //         if ($request['specialization_id'] != 0) {
    //             $users->where('specialization_id', $request['specialization_id']);
    //         }
    //         if ($request['Student_id'] != 0) {
    //             $users->where('id', $request['Student_id']);
    //         }

    //         $usersData = $users->get();
    //         if ($usersData->isNotEmpty()) {
    //             foreach ($usersData as $user) {
    //                 $user->notify(new Notifications([
    //                     "body" => $request['NoticeContent']
    //                 ]));
    //             }
    //         }
    //         toastr()->success('تمت العملية بنجاح');
    //         return redirect()->route('home');
    //     } catch (Exception $e) {
    //         toastr()->error('خطأ عند جلب البيانات');
    //         return redirect()->route('home');
    //     }
    // }
    // public function UpdateImageUniversityCalendar(Request $request)
    // {
    //     $user = auth()->user();
    //     if ($user->user_type == 'student_affairs' || $user->user_type == 'control') {
    //         toastr()->error("غير مصرح لك");
    //         return redirect()->back();
    //     }
    //     try {
    //         $request->validate([
    //             'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         ], [
    //             'file.required' => 'الصورة مطلوبة',
    //             'file.image' => 'يجب ان يكون الملف من نوع صوره',
    //             'file.mimes' => 'يجب ان يكون الملف باحد الامتدادات التالية jpeg,png,jpg,gif,svg ',
    //             'file.max' => 'اقصى حجم للصورة 2048',
    //         ]);
    //         $updateLibraryFile = $request->file('file');
    //         $updateLibraryFile->move(public_path('assets/'), 'UniversityCalendar.jpg');
    //         toastr()->success('تمت العملية بنجاح');


    //         return redirect()->route('home');
    //     } catch (Exception $e) {
    //         toastr()->error($e->getMessage());
    //         return redirect()->route('home');
    //     }
    // }