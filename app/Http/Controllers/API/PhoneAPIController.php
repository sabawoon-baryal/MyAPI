<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Phone;
use Validator;

class PhoneAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phone =  Phone::all();
        return $this->sendResponse($phone->toArray(),'Phones retrieved successfully.');
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
            'phone'=>'required',
       ]);

       if ($validator->fails()) {
           return $this->sendError('Validation Error.',$validator->errors());
       }

       $phone=Phone::create($input);
       return $this->sendResponse($phone->toArray(),'Phone created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phone = Phone::find($id);

        if(is_null($phone)){
            return $this->sendError('Phone not found.');
        }

        return $this->sendResponse($phone->toArray(),'phone  retrieved successfully');
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
            'phone' => 'phone',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $phone = Phone::find($id);

        if (is_null($phone)) {
            return $this->sendError('Phone not found.');
        }


        $phone->phone = $input['phone'];
        $phone->save();


        return $this->sendResponse($phone->toArray(), 'Phone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::find($id);


        if (is_null($phone)) {
            
            return $this->sendError('Phone not found.');
        }


        $phone->delete();


        return $this->sendResponse($id, 'Phone deleted successfully.');
    }

}
