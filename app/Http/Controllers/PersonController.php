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

   public function add(Request $request)
   {
       return view('person.add');
   }

   public function create(Request $request)
   {
       $param = [
           'name' => $request->name,
           'mail' => $request->mail,
           'age' => $request->age,
       ];

       $person = new Person();
       
       unset($request->_token);

       $person->fill($param)->save();
       return redirect('/person');
   }

   public function edit(Request $request)
   {
       $id = $request->id;
       $person = Person::find($id);
       return view('person.edit', ['form' => $person]);
   }

   public function update(Request $request)
   {
       $this->validate($request, Person::$rules, Person::$messages);
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

       $id = $request->id;
       $person = Person::find($id);
       $person->fill($param)->save();
       return redirect('/person');
   }


   public function delete(Request $request)
   {
       $id = $request->id;
       $person = Person::find($id);
       return view('person.del', ['form' => $person]);
   }

   public function remove(Request $request){
       $id = $request->id;
       $person = Person::find($id);
       $person->delete();
       return redirect('/person'); 
   }


    
}
