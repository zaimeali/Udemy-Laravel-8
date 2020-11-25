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

        <div class="d-flex flex-column justify-center px-5 py-3 align-items-center">
            <button class="btn btn-outline-primary btn-block w-50" type="submit">Update</button>
        </div>
    </form>
@endsection