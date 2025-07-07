<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRequest;
use Exception;



class PostController extends Controller
{
    public function index()
    {
        return view("page.posts.index",[
            'posts' => []
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view("page.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewRequest $request)
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
    public function update(NewRequest $request, string $id)
    {
     
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $name)
    {
       
    }
}
