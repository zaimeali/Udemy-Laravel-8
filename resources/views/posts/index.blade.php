@extends('layout.app')

@section('title', "All Posts")

@section('content')
    @forelse ($posts as $key => $post)

        {{-- @break($key == 3) --}}

        @include('posts.partials.post', [])

    @empty
        <p>No Post found</p>
    @endforelse
@endsection