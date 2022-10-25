<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index(){

        $administrators = Administrator::all();
        return view('MyPages/administrator',compact('administrators'));
            }
}
