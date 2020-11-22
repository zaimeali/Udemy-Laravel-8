@extends('layout.app')

@section('title', $post['title'])

@section('content')
    {{-- {{ dd($post) }} --}}
    
    <h1>{{ $post['title'] }}</h1>

    {{-- @if ($post['is_new'])
        <small>New Post</small>
    @else
        <small>Old Post</small>
    @endif

    @unless (!$post['has_comments'])
        <i>Has Comments</i>
    @endunless --}}

    <p>{{ $post['content'] }}</p>
@endsection