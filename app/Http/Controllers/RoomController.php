<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class RoomController extends Controller
{
    public function index()
    {
        return view("page.rooms.index",[
            'rooms' =>[]
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
    public function store(Request $request)
    {
      
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $name)
    {
        
    }
}
