<?php

namespace App\Http\Controllers;

use App\Models\proposals;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class ProposalController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $firestore = app('firebase.firestore')->database();
        $collection = $firestore->collection('proposals')->where('isApproved','==' , true);
        $data = [];

        foreach ($collection->documents() as $document) {
            if ($document->exists()) {
                $proposalsData = $document->data();
                $data[] = [
                    'id' => $document->id(),
                    'content' => $proposalsData['content'],
                    'department' => $proposalsData['department'],
                    'voteCount' => $proposalsData['voteCount'],
                ];
            }
        }
        return view("page.proposals.index",[
            'proposals'=>$data 
        ]);
       
    }
  
    public function create()
    {
        return view("page.proposals.create");
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
