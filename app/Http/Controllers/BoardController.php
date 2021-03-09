<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    
    public function index(Request $request)
    {
        $items = Board::all();
        return view('board.index', [ 'items' => $items]);
    }

    public function add(Request $request)
    {
       

        return view('board.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Board::$rules, Board::$messages);


        $param = [
            'person_id' => $request->person_id,
            'title' => $request->title,
            'message' => $request->message,
        ];

        $board = new Board();
        $board->fill($param)->save();
        return redirect('/board');
    }

}
