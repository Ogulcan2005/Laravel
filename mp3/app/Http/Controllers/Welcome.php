<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcom extends Controller
{
    public function hello(){
        return view("hello");
    }
}
