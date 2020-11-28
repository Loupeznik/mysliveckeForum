@extends('welcome')
@section('content')
    <h1>Profil uživatele {{ $account->uzivatelske_jmeno }}</h1>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col w-75">
                    <div class="card border-dark">
                        <img class="card-img-top" src="/img/avatar.png" alt="personalPic" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Osobní údaje</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Uživatelské jméno: {{ $account->uzivatelske_jmeno }}</li>
                                <li class="list-group-item">Počet příspěvků: {{ $authoredPosts->count() }}</li>
                                <li class="list-group-item">Datum registrace:
                                    {{ date('d.m.Y', strtotime($account->datum_registrace)) }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h2>Poslední příspěvky</h2>
                    <ul class="list-group list-group-flush">
                    @forelse ($authoredPosts as $post)
                        <li class="list-group-item list-group-item-dark"><a class="text-decoration-none text-bold text-dark" href="/posts/{{ $post->ID }}">{{ $post->nazev }}</a> <span
                            class="badge badge-pill badge-primary">Komentáře: {{ $post->response_count }}</span></li>
                    @empty
                    <li class="list-group-item list-group-item-warning">Uživatel ještě nevytvořil žádný příspěvek</li>
                    @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
