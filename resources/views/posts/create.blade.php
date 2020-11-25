@extends('layout.app')

@section('title', 'Create Blog Post')
    
@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        @include('posts.partials.form')

        {{-- <div>
            <input 
                value="@php old('title') @endphp" 
                type="text" name="title", placeholder="Enter Title"
            >
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div>
            <textarea name="content" placeholder="Enter Content">
                @php
                    old('content')
                @endphp
            </textarea>
            @error('content')
                {{ $message }}
            @enderror
        </div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <div class="d-flex flex-column justify-center px-5 py-3 align-items-center">
            <button class="btn btn-primary btn-block w-50" type="submit">Create Post</button>
        </div>
    </form>
@endsection