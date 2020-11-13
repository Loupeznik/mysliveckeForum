@forelse ($posts as $post)
{{$post->nazev}}
@empty
No posts in given category
@endforelse
