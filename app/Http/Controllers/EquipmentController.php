<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Location;
use Illuminate\Http\Request;
use Auth;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $locations=Location::orderBy('name','asc')->get();
        $equipments=Equipment::orderBy('created_at','desc')->get();

        return view('admin.equipment.index',compact('user','locations','equipments'));
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
        $this->validate($request,[
            'equipname'=>'required',
            'make'=>'required',
            'purchasedate'=>'required',
            'status'=>'required',
            'location_id'=>'required',
        ]);

        Equipment::create($request->all());

        return redirect(route('equipment.index'));
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
        $user=Auth::user();
        $locations=Location::orderBy('name','asc')->get();
        $equipments=Equipment::where('id',$id)->first();

        return view('admin.equipment.edit',compact('user','locations','equipments'));
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
        $this->validate($request,[
            'equipname'=>'required',
            'make'=>'required',
            'purchasedate'=>'required',
            'status'=>'required',
            'location_id'=>'required',
        ]);

        $equipment=Equipment::find($id);
        $equipment->equipnumber=$request->equipnumber;
        $equipment->equipname=$request->equipname;
        $equipment->make=$request->make;
        $equipment->purchasedate=$request->purchasedate;
        $equipment->status=$request->status;
        $equipment->user_id=$request->user_id;
        $equipment->location_id=$request->location_id;
        $equipment->save();

        return redirect(route('equipment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipment::where('id',$id)->delete();

        return back();
    }
}
