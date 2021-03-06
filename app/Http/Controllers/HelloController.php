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
        if ($request->hasCookie('msg')){
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = '※クッキーはありません';
        }
        return view('hello.index', ['msg' => $msg]);
    }
    
    public function post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];
     
        $this->validate($request, $validate_rule , ['msg.required' => '入力してください'] );

        $msg = $request->msg;
        $response = response()->view('hello.index', [
            'msg' => 'クッキーに保存しました'
        ]);

        $response->cookie('msg', $msg, 100);
        return $response;

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