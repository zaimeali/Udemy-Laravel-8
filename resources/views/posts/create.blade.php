@extends('layout.app')

@section('title', 'Create Blog Post')
    
@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div>
            <input 
                value="@php old('title') @endphp" 
                type="text" name="title", placeholder="Enter Title"
            >
        </div>
        <div>
            <textarea name="content" placeholder="Enter Content">
                @php
                    old('content')
                @endphp
            </textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection