@extends('welcome')
@section('content')
    <h1 class="prispevek-nadpis"> {{ $post->nazev }} </h1>
    <h2 class="prispevek-podnadpis">Přidáno: {{ date('d.m.Y h:m', strtotime($post->pridano)) }}</h2>
    <div class="card bg-light mb-3">
        <div class="card-header d-flex justify-content-between">
            <p><i class="fas fa-user"></i> {{ $post->User->uzivatelske_jmeno }}</p>
            <p><i class="fas fa-folder-open"></i> {{ $post->Category->nazev }}</p>
        </div>
        <div class="card-body">
            <p>{{ $post->obsah }}</p>
            @auth
            @if ($post->User->ID == Auth::user()->ID)
            <form method="POST" action="/posts/{{ $post->ID }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Smazat</button>
            </form>
            @endif
            @endauth
        </div>
    </div>
    <h2>Odpovědi</h2>
    @forelse ($post->response as $response)
        <div class="card border-warning mb-3">
            <div class="card-header d-flex justify-content-between">
                <p><i class="fas fa-user"></i> {{ $response->User->uzivatelske_jmeno }}</p>
                <p><i class="fas fa-user-clock"></i> {{ date('d.m.Y h:m', strtotime($response->odeslano)) }}</p>
            </div>
            <div class="card-body">
                <p>{{ $response->obsah }}</p>
            @auth
            @if ($response->User->ID == Auth::user()->ID)
            <form method="POST" action="/posts/response/{{ $response->ID }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Smazat</button>
            </form>
            @endif
            @endauth
            </div>
        </div>
    @empty
        Žádná odpověď k tomuto příspěvku neexistuje
    @endforelse
    @auth
        <h2 id="comment">Komentovat</h2>
        <form method="POST" action="/posts/{{ $post->ID }}/comment">
            @csrf
            <div class="form-group" style="padding-top: 10px">
                <textarea class="form-control" rows="3" name="content"></textarea>
                <button type="submit" class="btn btn-primary float-right" style="margin-top: 10px">Odoslať</button>
            </div>
        </form>
    @endauth
    </div>
@endsection
