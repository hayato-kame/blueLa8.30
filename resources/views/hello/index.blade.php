@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです</p>

    @component('components.message')
        @slot('msg_title')
        CAUTION!
        @endslot

        @slot('msg_content')
        これはメッセージです
        @endslot
    @endcomponent

    @include('components.message', ['msg_title' => 'OK', 'msg_content' => 'こんてんつ'])

    <ul>
        @each('components.item', $data, 'item')
    </ul>

    <p>コントローラから来た<br>message = {{$message}}</p>

    <p>ビューコンポーザから来た<br>view_message = {{$view_message}}


@endsection


@section('footer')
copyright 2020 tuyano.
@endsection
