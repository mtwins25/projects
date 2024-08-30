<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteSupervisorRequest;
use App\Http\Requests\SupervisorRequest;
use App\Models\supervisor;
use Illuminate\Http\Request;

class SuperVisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisors=supervisor::select('S_id','S_name')->get();
        $data=supervisor::get();
        return view('Admin.SuperVisor.index',['data'=>$data,'supervisors'=>$supervisors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.SuperVisor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisorRequest $request)
    {
        supervisor::create([

            'S_name'=>$request->S_name,
            'phoneNumber'=>$request->phoneNumber,



        ]

         );
        return redirect()->back()->with('msg','Added..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=supervisor::findorfail($id);
        return view("Admin.SuperVisor.show",['data'=>$data]);
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
        $supervisor=supervisor::findorfail($id);

        return view('Admin.SuperVisor.edit',['supervisor'=>$supervisor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisorRequest $request, $id)
    {
        $supervisor=supervisor::findorfail($id);
        $supervisor->update([

            'S_name'=>$request->S_name,
            'phoneNumber'=>$request->phoneNumber,
  ]

         );

        return redirect()->route('supervisors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,DeleteSupervisorRequest  $request)
    {
        $counter=0;
        $arry=[];


        $supervisor=supervisor::findorfail($id);

        if (supervisor::count() === 1) {
            return redirect()->route('supervisors.index')->with('error', 'Cannot delete the only remaining supervisor.');
        }

        foreach($supervisor->supervises as $value)
        {
            $arry[$counter]=$value->C_id;
            $counter++;

        }
        $supervisor->supervises()->detach();
        $newSupervisor=supervisor::findorfail($request->id);
        $newSupervisor->supervises()->attach($arry);

        // if($replace){
        //     foreach ($replace as $values)
        //     $values->update(['sSuper_id'=>$request->id]);


        // }

        $supervisor->delete();
        return redirect()->route('supervisors.index')->with('msg','deleted..');
    }
}
