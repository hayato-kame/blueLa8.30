<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class HelloController extends Controller
{
  
   public function index()
   {
      $data =[
        ['name' => 'たろう', 'mail' => 'taro@yamada'],
        ['name' => 'はなこはなこ', 'mail' => 'hanako@yamada'],
        ['name' => 'jirou', 'mail' => 'jiro@yamada'],
      ];
      return view('hello.index',['message' => 'コントローラから' , 'data' => $data]);
   }

   public function post(Request $request)
   {
       $input = $request->input;
      
       return view('hello.index', ['msg' =>  $input ]);
   }
}