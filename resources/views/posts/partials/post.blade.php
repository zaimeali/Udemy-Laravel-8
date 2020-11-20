<h2>{{ $post['title'] }}</h2>

@isset($post['author'])
    by <small>{{ $post['author'] }}</small>
@endisset

@if (!$loop->last)
    <hr>
@endif