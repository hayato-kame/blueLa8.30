<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class HelloController extends Controller
{
  
   public function index()
   {
      $data = ['one', 'two', 'three'];
      return view('hello.index', ['data' => $data]);
   }

   public function post(Request $request)
   {
       $input = $request->input;
      
       return view('hello.index', ['msg' =>  $input ]);
   }
}