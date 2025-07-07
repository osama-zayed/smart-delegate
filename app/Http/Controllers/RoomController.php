<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class RoomController extends Controller
{
    public function index()
    {

        $firestore = app('firebase.firestore')->database();
        $collection = $firestore->collection('rooms');
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
        return view("page.rooms.index", [
            'rooms' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("page.Course.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}


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
            $collection = $firestore->collection('rooms');

            // التحقق من وجود المستند ثم حذفه
            $document = $collection->document($id);
            if ($document->snapshot()->exists()) {
                $document->delete();
                return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
            } else {
                return redirect()->route('rooms.index')->with('error', 'Room not found.');
            }
        } catch (\Exception $e) {
            return redirect()->route('rooms.index')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
