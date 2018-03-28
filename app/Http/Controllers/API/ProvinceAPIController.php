<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Province;
use Validator;

class ProvinceAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $province =  Province::all();
        return $this->sendResponse($province->toArray(),'Provinces retrieved successfully.');
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
            'name'=>'required',
       ]);

       if ($validator->fails()) {
           return $this->sendError('Validation Error.',$validator->errors());
       }

       $province=Province::create($input);
       return $this->sendResponse($province->toArray(),'Province created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $province = Province::find($id);

        if(is_null($province)){
            return $this->sendError('Province not found.');
        }

        return $this->sendResponse($province->toArray(),'province retrieved successfully');
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
            'name' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $province = Province::find($id);

        if (is_null($province)) {
            return $this->sendError('Province not found.');
        }


        $province->name = $input['name'];
        $province->save();


        return $this->sendResponse($province->toArray(), 'Province updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province = Province::find($id);


        if (is_null($province)) {
            
            return $this->sendError('Province not found.');
        }


        $province->delete();


        return $this->sendResponse($id, 'Province deleted successfully.');
    }

}
