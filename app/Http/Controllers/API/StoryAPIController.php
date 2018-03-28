<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Story;
use Validator;

class StoryAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $story =  Story::all();
        return $this->sendResponse($story->toArray(),'Stories retrieved successfully.');
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

       $story=Story::create($input);
       return $this->sendResponse($story->toArray(),'Story created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::find($id);

        if(is_null($story)){
            return $this->sendError('Story not found.');
        }

        return $this->sendResponse($story->toArray(),'Story  retrieved successfully');
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


        $story = Story::find($id);

        if (is_null($story)) {
            return $this->sendError('Story not found.');
        }


        $story->description = $input['description'];
        $story->save();


        return $this->sendResponse($story->toArray(), 'Story updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);


        if (is_null($story)) {
            
            return $this->sendError('Story not found.');
        }


        $story->delete();


        return $this->sendResponse($id, 'Story deleted successfully.');
    }

}
