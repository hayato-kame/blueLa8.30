@extends('layouts.helloapp')

@section('title', 'Board.Index')

@section('menubar')
    @parent
    メッセージ一覧
@endsection

@section('content')

    <table>
        <tr><th>person_id</th><th>title</th><th>data</th></tr>
        @foreach($items as $item)
        <tr><td>{{$item->person_id}}</td><td>{{$item->title}}</td><td>{{$item->getData()}}</td></tr>
        @endforeach
    </table>
@endsection


@section('footer')
copyright 2020 tuyano.
@endsection