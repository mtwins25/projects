<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\child;
use App\Models\oparent;

class AcVisitorsController extends Controller
{
    public function index()
    {
        //
        $data=child::get();
    //    return $data;

        return view("Admin.Visits.ACVisitors",['data'=>$data]);
    }
    public function destroy($id,Request $request)
    {
        $parent=oparent::findOrFail($id);
        $parent->visitsChildren()->detach($request->C_id);
        return redirect()->back()->with('msg','canceled..');
    }

}
