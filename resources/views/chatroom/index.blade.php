@extends('welcome')
@section('content')
<h1>Vaše chatovací místnosti</h1>
<div class="list-group mb-3">
@forelse ($rooms as $room)
<a href="/chat/{{$room->ID}}" class="list-group-item list-group-item-action list-group-item-secondary mb-1">{{$room->nazev}}</a>
@empty
Nejste členem žádné chatovací místnosti
@endforelse
</div>
<a class="btn btn-primary" data-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">Vytvořit místnost</a>
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
