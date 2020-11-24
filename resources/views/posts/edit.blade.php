@extends('layout.app')

@section('title', 'Update Blog Post')
    
@section('content')
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
        @csrf
        {{-- @php
            dd($post->content)
        @endphp --}}
        @method('PUT')
        @include('posts.partials.form')

        <div>
            <button type="submit">Update</button>
        </div>
    </form>
@endsection