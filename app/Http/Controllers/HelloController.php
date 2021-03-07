<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{

    public function index(Request $request)
    {

        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);

        // if (isset($request->id))
        // {
        //     $param = ['id' => $request->id];
        //     $items = DB::select('select * from people where id = :id', 
        //     $param);
        // } else {
        //     $items = DB::select('select * from people');
        // }
        // return view('hello.index', ['items' => $items]);

    }

    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        return redirect('/hello');
    }


    public function message(Request $request)
    {
        return view('hello.message', ['msg' => 'フォームを入力：']);
    }

    public function error(Request $request)
    {
        return view('hello.error', ['msg' => 'フォームを入力：']);
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.edit', [ 'form' => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name = :name, mail = :mail, 
        age = :age where id = :id' , $param);
        return redirect('/hello');
    }

    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello/del',[ 'form' => $item[0]] );
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from people where id = :id', $param);
        return redirect('/hello');
    }
}
