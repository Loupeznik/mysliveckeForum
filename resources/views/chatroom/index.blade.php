@extends('welcome')
@section('content')
    <h1>Vaše chatovací místnosti</h1>
    <ul class="list-group mb-3">
        @forelse ($rooms as $room)
            <li class="list-group-item list-group-item-action list-group-item-secondary mb-1 d-flex justify-content-between">
                <a class="text-info text-decoration-none font-weight-bold text-uppercase" href="/chat/{{ $room->ID }}">{{ $room->nazev }}</a>
                @if ($room->admin_id == Auth::user()->ID)
                <form method="POST" action="/chat/{{ $room->ID }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
                @endif
            </li>
        @empty
            Nejste členem žádné chatovací místnosti
        @endforelse
    </ul>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapse" role="button" aria-expanded="false"
        aria-controls="collapse">Vytvořit místnost</a>
    <div class="collapse" id="collapse">
        <div class="mt-2 mb-3">
            <form method="POST" action="/chat">
                @csrf
                <div class="form-group">
                    <label for="nazev">Název místnosti</label>
                    <input type="text" class="form-control" id="nazev" name="nazev">
                </div>
                <button type="submit" class="btn btn-primary">Založit místnost</button>
            </form>
        </div>
    </div>
@endsection
