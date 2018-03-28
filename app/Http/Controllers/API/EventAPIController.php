<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Event;
use Validator;

class EventAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event =  Event::all();
        return $this->sendResponse($event->toArray(),'Events retrieved successfully.');
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
            'description'=>'required',
       ]);

       if ($validator->fails()) {
           return $this->sendError('Validation Error.',$validator->errors());
       }

       $event=Event::create($input);
       return $this->sendResponse($event->toArray(),'Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        if(is_null($event)){
            return $this->sendError('Event not found.');
        }

        return $this->sendResponse($event->toArray(),'Event retrieved successfully');
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
            'description' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $event = Event::find($id);

        if (is_null($event)) {
            return $this->sendError('Event not found.');
        }


        $event->description = $input['description'];
        $event->save();


        return $this->sendResponse($event->toArray(), 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);


        if (is_null($event)) {
            
            return $this->sendError('Event not found.');
        }


        $event->delete();


        return $this->sendResponse($id, 'Event deleted successfully.');
    }

}
