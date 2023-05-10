<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    function viewHome() {return view('home');}
    function viewAboutUs() {return view('about-us');}
}
