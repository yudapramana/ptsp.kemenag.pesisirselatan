<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Type $var = null)
    {
        return view('web.index');
    }
}
