@extends('welcome')
@section('content')
    <h3 class="login">Nový příspěvek</h3>

    <form method="POST" action="/posts">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nazev">Název příspěvku</label>
                <input type="text" name="nazev" class="form-control" id="nazev" required autofocus>
            </div>
            <div class="form-group col-md-6">
                <label for="kat">Kategorie</label>
                <select class="form-control" id="kat" name="kategorie" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->ID }}">{{ $category->nazev }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="obsah">Text příspěvku</label>
            <textarea class="form-control" rows="5" name="obsah" id="obsah"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Vložit příspěvek</button>
    </form>
@endsection
