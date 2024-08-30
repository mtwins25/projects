<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\child;
use App\Models\oparent;
use App\Models\supervisor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $data=child::get();
        $qparent=oparent::get();
        $qsupervisors=supervisor::get();
        $parents=oparent::count();
        $supervisors=supervisor::count();
        $children=child::where('adopted',0)->count();
        $children2=child::where('adopted',0)->get();
        $visits=0;
        $adoptions=0;

        foreach($qparent as $vparents)
        {
            foreach($vparents->visitsChildren as $vparent)
            {
                if($vparent->pivot->request=='accepted')
                {
                    $visits++;
                }
            }
        }

        foreach($qparent as $aparents)
        {
            foreach($aparents->adoptsChildren as $aparent)
            {

                    $adoptions++;

            }
        }

        return view('Admin.index',['parents_C'=>$parents,'supervisors_C'=>$supervisors,'children_C'=>$children,'children_R'=>$children2,'visits_C'=>$visits,'adoptions_C'=>$adoptions,'data'=>$data,'qsupervisors'=> $qsupervisors]);
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
        //
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
