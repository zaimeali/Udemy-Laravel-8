<h2>
    <a class="" href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post['title'] }}</a>
</h2>

{{-- @isset($post['author'])
    by <small>{{ $post['author'] }}</small>
@endisset --}}

@if ($post->comments_count)
    <small>
        {{ $post->comments_count }} @if($post->comments_count > 1) comments @else comment @endif
    </small>
@else
    <small>No Comments yet!</small>
@endif
 
<div class="">

    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-outline-success">Edit</a>

    <form class="d-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">

        @csrf
        @method('DELETE')
    
        <button class="btn btn-outline-danger" type="submit">Delete</button>
    </form>
</div>

@if (!$loop->last)
    <hr>
@endif