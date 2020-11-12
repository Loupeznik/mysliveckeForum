@foreach($posts as $post)
<h1>{{$post->nazev}}</h1>
<p>{{$post->obsah}} <br> {{$post->pridano}} <br> {{$post->Category->nazev}} <br> {{$post->User->uzivatelske_jmeno}}</p>
@endforeach
<!-- dokončit logiku s forelse + frontend scaffold -->