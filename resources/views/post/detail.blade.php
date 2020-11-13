<h1>POST {{$post->nazev}}</h1>
<h4>Added: {{$post->pridano}}</h4>
<i>Přidal {{$post->User->uzivatelske_jmeno}} do kategorie {{$post->Category->nazev}}</i>
<p>{{$post->obsah}}</p>
-------------------------------------
<h2>Odpovědi</h2>
@forelse ($post->response as $response)
<i>{{$response->User->uzivatelske_jmeno}} - {{$response->odeslano}}</i>
<p>{{$response->obsah}}</p>
-------------------------------------<br>
@empty
Žádná odpověď k tomuto příspěvku neexistuje
@endforelse
