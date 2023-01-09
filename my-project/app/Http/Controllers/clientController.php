<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientController extends Controller
{
    public function client(){
        return view('client');
    }
}
