<h2>{{ $post['title'] }}</h2>

{{-- @isset($post['author'])
    by <small>{{ $post['author'] }}</small>
@endisset --}}

<form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">

    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>

@if (!$loop->last)
    <hr>
@endif