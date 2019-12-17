<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Servicereport;
use Illuminate\Http\Request;

use Auth;

class ServicereportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        
        $equipments=Equipment::orderBy('equipname','asc')->get();
        $servicereports=Servicereport::orderBy('created_at','desc')->get();

        return view('admin.servicereport.index',compact('user','servicereports','equipments'));
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
        
        Servicereport::create($request->all());

        return redirect(route('servicereport.index'));
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
        

        $servicereport=Servicereport::find($id);
        $servicereport->servicenum=$request->servicenum;
        $servicereport->equipment_id=$request->equipment_id;
        $servicereport->servicedate=$request->servicedate;
        $servicereport->serviceduedate=$request->serviceduedate;
        $servicereport->servicereason=$request->servicereason;
        $servicereport->servicedby=$request->servicedby;
        $servicereport->phone=$request->phone;
        $servicereport->save();

        return redirect(route('servicereport.index'));
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
