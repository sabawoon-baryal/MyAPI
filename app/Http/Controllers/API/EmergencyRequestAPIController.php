<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\EmergencyRequest;
use Validator;

class EmergencyRequestAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emergencyRequest =  EmergencyRequest::all();
        return $this->sendResponse($emergencyRequest->toArray(),'EmergencyRequests retrieved successfully.');
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
            'date_time'=>'required',
       ]);

       if ($validator->fails()) {
           return $this->sendError('Validation Error.',$validator->errors());
       }

       $emergencyRequest=EmergencyRequest::create($input);
       return $this->sendResponse($emergencyRequest->toArray(),'EmergencyRequest created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emergencyRequest = EmergencyRequest::find($id);

        if(is_null($emergencyRequest)){
            return $this->sendError('EmergencyRequest not found.');
        }

        return $this->sendResponse($emergencyRequest->toArray(),'EmergencyRequest retrieved successfully');
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
            'date_time' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $emergencyRequest = EmergencyRequest::find($id);

        if (is_null($emergencyRequest)) {
            return $this->sendError('EmergencyRequest not found.');
        }


        $emergencyRequest->date_time = $input['date_time'];
        $emergencyRequest->save();


        return $this->sendResponse($emergencyRequest->toArray(), 'EmergencyRequest updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emergencyRequest = EmergencyRequest::find($id);


        if (is_null($emergencyRequest)) {
            
            return $this->sendError('EmergencyRequest not found.');
        }


        $emergencyRequest->delete();


        return $this->sendResponse($id, 'EmergencyRequest deleted successfully.');
    }

}
