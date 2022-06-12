<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Patient;
use Image;
use DB;
class Patients extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|unique:patients',
            'Admin_id'=> 'required',
           ]);

         if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path = 'backend/patients/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            $patient = new Patient;
            $patient->Admin_id = $request->Admin_id;
            $patient->name = $request->name;
            $patient->email = $request->email;
            $patient->age = $request->age;
            $patient->cnic = $request->cnic;
            $patient->gender = $request->gender;
            $patient->phone = $request->phone;
            $patient->reffered_by = $request->reffered_by;
            $patient->photo = $image_url;
            $patient->save();
        }else{
            $patient = new Patient;
            $patient->Admin_id = $request->Admin_id;
            $patient->name = $request->name;
            $patient->email = $request->email;
            $patient->age = $request->age;
            $patient->cnic = $request->cnic;
            $patient->gender = $request->gender;
            $patient->phone = $request->phone;
            $patient->reffered_by = $request->reffered_by;
            $patient->save();

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
