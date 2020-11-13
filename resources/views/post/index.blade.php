@forelse($posts as $post)
<h1><a href="/posts/{{$post->ID}}">{{$post->nazev}}</a></h1>
<p>{{$post->obsah}} <br> {{$post->pridano}} <br> {{$post->Category->nazev}} <br> {{$post->User->uzivatelske_jmeno}} <br> Počet komentářů: {{$post->response_count}} </p>
@empty
empty
@endforelse
<!-- dokončit logiku s forelse + frontend scaffold -->
