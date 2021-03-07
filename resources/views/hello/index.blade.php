@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection
@if (count($errors) >0)
<p>入力に問題があります。再入力してください</p>
@endif


@section('content')


<form action="/hello" method="post">
    @csrf
    <table>
        <tr><th>Name</th><th>Mail</th><th>Age</th></tr>

        @foreach ($items as $item)
        <tr><td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td></tr>
        @endforeach
       

    </table>
</form>

@endsection


@section('footer')
copyright 2020 tuyano.
@endsection
