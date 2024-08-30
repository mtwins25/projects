<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisitDateParentRequest;
use App\Models\child;
use App\Models\oparent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=child::where('adopted',0)->get();
        $children=[];
        $count=0;


        if(Auth::check()){


            if(Auth::user()->isAdmin == 1){
                return view('Front.Parent.index',['data'=>$data]);
            }
            else{
                $parent=oparent::where ("user_id",Auth::user()->id)->get();


            foreach($data as $child)
            {
                if($child->visitsparents()->count()>=1)
                {

                $flag=0;

                foreach($child->visitsParents as $childparent)
                {
                   if($childparent->pivot->vparent_id==$parent[0]->P_id)
                   {
                    $flag++;



                   }


                }


                if($flag==0)
                {


                    $children[$count]=$child;
                    $count ++;

                }

            }
            else{
              $children[$count]=$child;
              $count++;
                }

            }

            }




            return view('Front.Parent.index',['data'=>$children,'parent'=>isset($parent[0])?$parent[0]:null]);

        }

        // $parent=oparent::findOrFail('P_id');


        return view('Front.Parent.index',['data'=>$data]);
    }

    public function about()
    {

        return view('Front.Parent.about');
    }



    public function visits(VisitDateParentRequest  $request, $id){

        $parent=oparent::findOrFail($id);
        $parent->visitsChildren()->attach($request->C_id,['visitDate'=>$request->visitDate,'request'=>"requested"]);
        return redirect()->route('parents.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('Parent.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     oparent::create([

    //         'P_name'=>$request->P_name,
    //         'phoneNumber'=>$request->phoneNumber,
    //         'password'=>$request->password,



    //     ]

    //      );
    //     return redirect()->route('/');
    // }

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
