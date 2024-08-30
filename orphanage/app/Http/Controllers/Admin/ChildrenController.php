<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildrenRequest;
use App\Http\Requests\ChildrenUpdateRequest;
use App\Models\child;
use App\Models\supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=child::where('adopted',0)->get();
        return view('Admin.Children.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisors=supervisor::select('S_id','S_name')->get();
        return view('Admin.Children.create',['supervisors'=>$supervisors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildrenRequest $request)
    {
        // child::create([

        //     'C_name'=>$request->C_name,
        //     'birthDate'=>$request->birthDate,
        //     'arrivalDate'=>$request->arrivalDate,


        // ]

        //  );
        $image_name=$request->C_name.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('children',$image_name,'upload');
        $id=child::insertGetId(['C_name'=>$request->C_name,
        'birthDate'=>$request->birthDate,
        'arrivalDate'=>$request->arrivalDate,
        'image'=>$image_name
    ]);

    $supervisor=supervisor::findOrFail($request->S_id);
    $supervisor->supervises()->attach($id);

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
        $data=child::findorfail($id);

        return view('Admin.Children.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $supervisors=supervisor::get();
        $child=child::findorfail($id);

        foreach($supervisors as $value)
        {
            foreach($value->supervises as $row)
       {
       if($row->C_id==$id)
       {$cs_id=$value->S_id;}
        }}
        // return $result;

        return view('Admin.Children.edit',['child'=>$child,'supervisors'=>$supervisors,'cs_id'=>$cs_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChildrenUpdateRequest $request, $id)
    {
        $child=child::findorfail($id);
        $oldImage=$child->image;

        if($request->hasFile('image')){
            $image_name=$request->C_name.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('children',$image_name,'upload');
            $child->update([

                'C_name'=>$request->C_name,
                'birthDate'=>$request->birthDate,
                'arrivalDate'=>$request->arrivalDate,
                'image'=>$image_name
        ]);
        Storage::disk('upload')->delete('children/' .$oldImage);
        }
       else{
        $child->update([

            'C_name'=>$request->C_name,
            'birthDate'=>$request->birthDate,
            'arrivalDate'=>$request->arrivalDate,
          ]);
       }



    $supervisor=supervisor::findOrFail($request->cs_id);
    $supervisor->supervises()->detach($id);

    $newSupervisor=supervisor::findOrFail($request->S_id);
    $newSupervisor->supervises()->attach($id);

    return redirect()->route('children.index');
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
