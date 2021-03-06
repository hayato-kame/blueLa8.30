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
    
<p> {{$msg}} </p>

<form action="/hello" method="post">
    @csrf
    <table>
        @if ($errors->has('msg'))
        <tr><th>ERROR</th><td>{{$errors->first('msg')}}</td></tr>
        @endif

        <tr><th>Message: </th><td><input type="text" name="msg" 
            value="{{old('msg')}}"></td></tr>
        
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
</form>

@endsection


@section('footer')
copyright 2020 tuyano.
@endsection
