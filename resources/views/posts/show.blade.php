@extends('layout.app')

@section('title', $post['title'])

@section('content')
    {{-- {{ dd($post) }} --}}

    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>
@endsection