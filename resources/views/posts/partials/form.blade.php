{{-- @php
    dd($post)
@endphp --}}
<div class="form-group">
    <label for="title">Title</label>
    <input
        id="title"
        class="form-control" 
        value="{{ old('title', optional($post ?? null)->title) }}" 
        type="text" 
        name="title", placeholder="Enter Title"
    >
    @error('title')
        <div class="alert alert-danger my-2">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea 
        id="content"
        class="form-control" 
        name="content" 
        placeholder="Enter Content">{{ old('content', optional($post ?? null)->content) }}</textarea>
        {{-- @php
            echo trim(old('content', $post->content))
        @endphp --}}
    
    @error('content')
        <div class="alert alert-danger my-2">
            {{ $message }}
        </div>
    @enderror
</div>
@if ($errors->any())
    <div mb-3>
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-warning">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif