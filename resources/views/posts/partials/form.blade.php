{{-- @php
    dd($post)
@endphp --}}
<div>
    <input 
        value="{{ old('title', optional($post ?? null)->title) }}" 
        type="text" name="title", placeholder="Enter Title"
    >
    @error('title')
        {{ $message }}
    @enderror
</div>
<div>
    <textarea name="content" placeholder="Enter Content">{{ old('content', optional($post ?? null)->content) }}</textarea>
        {{-- @php
            echo trim(old('content', $post->content))
        @endphp --}}
    
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
@endif