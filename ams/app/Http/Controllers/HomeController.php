<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function records(){
        return view('records');
    }

    public function fees(){
        return view('fees');
    }
}
