<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use App\Models\oparent;
use App\Models\User;


class AdminParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=oparent::get();
        return view('Admin.Parent.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('Admin.Parent.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     return view('Admin.Parent.store');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=oparent::findorfail($id);
        return view('Admin.Parent.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $Aparent=oparent::findorfail($id);

        return view('Admin.parent.edit',['Aparent'=>$Aparent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParentRequest $request, $id)
    {

        $Aparent=oparent::findorfail($id);
        $Aparent->update([

            'P_name'=>$request->P_name,
            'phoneNumber'=>$request->phoneNumber,
  ]

         );
         $user=User::findorfail( $Aparent->user_id);
         $user->update([

            'email'=>$request->email,
            ]);

        return redirect()->route('Aparents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
