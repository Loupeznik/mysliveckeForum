@extends('welcome')
@section('content')
    @auth
        <a class="btn btn-primary mb-2" href="/posts/create">Vložit příspěvek</a>
    @endauth
    <div class="card-deck">
        @forelse($posts as $post)
            <div class="card">
                <img src="/img/jelen_placeholder.jpg" class="card-img mx-auto rounded">
                <div class="card-body">
                    <h5 class="card-title"><a href="/posts/{{ $post->ID }}">{{ $post->nazev }}</a> <span
                            class="badge badge-pill badge-primary">Komentáře: {{ $post->response_count }}</span></h5>
                    <h6 class="card-subtitle mb-2 text-secondary">Přidal <i><a class="text-decoration-none text-dark"
                                href="/account/{{ $post->User->ID }}">{{ $post->User->uzivatelske_jmeno }}</a></i> v kategorii
                        <i>{{ $post->Category->nazev }}</i>
                    </h6>
                    <p class="card-text">{{ $post->obsah }}
                    </p>
                    @auth
                        <a href="/posts/{{ $post->ID }}" class="btn btn-success float-right">Komentovať</a>
                    @endauth
                </div>
                <div class="card-footer">
                    <small class="text-muted">
                        @if ($post->response_count > 0)
                            Posledný komentár - pred
                            {{ \Carbon\Carbon::parse($post->response->max('odeslano'))->diffInDays(now(), false) }} dny
                        @else
                            Žádné komentáře
                        @endif
                    </small>
                </div>
            </div>
        @empty
            Nebyly nalezeny žádné příspěvky
        @endforelse
    </div>
@endsection
