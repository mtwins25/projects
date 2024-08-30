<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdoptionRequest;
use App\Models\child;
use App\Models\oparent;
use App\Models\supervisor;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=oparent::get();

        return view("Admin.Adoptions.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $children=child::where('adopted',0)->get();

        $parents=oparent::get();
        return view('Admin.Adoptions.create',['children'=>$children,'parents'=>$parents]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdoptionRequest $request)
    {
        $child=child::findorfail($request->C_id);
        $supervisors=supervisor::get();

        foreach($supervisors as $value)
        {
            foreach($value->supervises as $row)
       {
       if($row->C_id==$request->C_id)
       {$cs_id=$value->S_id;}
        }}

        $supervisor=supervisor::findorfail($cs_id);
        $supervisor->supervises()->detach($request->C_id);

        $child->update(['adopted'=>1]);


        $parent=oparent::findOrFail($request->P_id);
        $parent->adoptsChildren()->attach($request->C_id, ['adoptionDate' => $request->adoptionDate]);
        $child->visitsParents()->detach();


        return redirect()->route('admin');
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
