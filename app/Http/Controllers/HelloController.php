<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
  
    public function index(Request $request)
    {
       return view('hello.index', ['msg' => 'フォームを入力してください']);

    }
    
    public function post(HelloRequest $request)
    {
        

        return view('hello.index', ['msg' => '正しく入力されました']);
    }
    
    
    public function message(Request $request)
    {
        return view('hello.message', ['msg' => 'フォームを入力：']);
    }

    public function error(Request $request)
    {
        return view('hello.error', ['msg' => 'フォームを入力：']);
    }

}