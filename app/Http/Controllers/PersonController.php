<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{

    public function index(Request $request)
    {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    public function find(Request $request)
    {
       
        $input = '';
        return view('person.find', ['input' => $input]);
    }

    public function search(Request $request)
    {
        $item = Person::find($request->input);
        return view('person.find', ['item' => $item, 'input' => $request->input]);

    }
    
}
