@extends('layouts.helloapp')

@section('title' , 'Board.Add')

@section('menubar')
    @parent
    メッセージ新規ページ
@endsection

@section('content')

<div>
    <ul>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif
    </ul>

</div>

<form action="/board/add" method="post">
    <table>
        @csrf 
        <tr><th>person_id</th><td><input type="number" name="person_id" value="{{old('person_id')}}">
        </td></tr>
        <tr>
            <th>title</th>
            <td><input type="text" name="title" value="{{old('title')}}"></td>
        </tr>
        <tr>
            <th>message</th>
            <td><input type="textarea" name="message" value="{{old('message')}}"></td>
        </tr>

        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>

</form>


@endsection

@section('footer')
copyright 2020 tuyano.
@endsection