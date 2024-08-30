<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\oparent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        return view('Front.index');
    }
}
