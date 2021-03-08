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

//    public function search(Request $request)
//    {
//       $item = Person::nameEqual( $request->input )->first();
//       $param = [
//           'item' => $item,
//           'input' => $request->input,
//       ];

//       return view('person.find', $param);

//    }

   public function search(Request $request)
   {
       $min = $request->input * 1;
       $max = $min + 10;
       $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();

       $param = ['input' => $request->input, 'item' => $item];
       return view('person.find', $param);
   }

  
    
}
