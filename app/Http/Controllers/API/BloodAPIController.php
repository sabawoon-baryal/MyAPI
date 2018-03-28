<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Blood;
use Validator;

class BloodAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blood =  Blood::all();
        return $this->sendResponse($blood->toArray(),'Bloods retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = $request->all();
       $validator = Validator::make($input,[
            'type'=>'required',
       ]);

       if ($validator->fails()) {
           return $this->sendError('Validation Error.',$validator->errors());
       }

       $blood=Blood::create($input);
       return $this->sendResponse($blood->toArray(),'Blood created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blood = Blood::find($id);

        if(is_null($blood)){
            return $this->sendError('Blood not found.');
        }

        return $this->sendResponse($blood->toArray(),'blood retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'type' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $blood = Blood::find($id);

        if (is_null($blood)) {
            return $this->sendError('Blood not found.');
        }


        $blood->type = $input['type'];
        $blood->save();


        return $this->sendResponse($blood->toArray(), 'Blood updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blood = Blood::find($id);


        if (is_null($blood)) {
            
            return $this->sendError('Blood not found.');
        }


        $blood->delete();


        return $this->sendResponse($id, 'Blood deleted successfully.');
    }

}
