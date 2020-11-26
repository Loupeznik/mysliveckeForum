@extends('welcome')
@section('content')
    <h3 class="login">Prihlásenie uživateľa</h3>

    <form method="POST" action="/login">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Uživateľské jméno</label>
                <input type="text" name="uzivatelske_jmeno" class="form-control" id="inputEmail4" required autofocus>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Heslo</label>
                <input type="password" name="password" class="form-control" id="inputPassword4" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Prihlásiť</button>
        <div class="login1">
            <p>Nie ste registrovaný? Môžete tak urobiť kliknutím <a href="/register">TU!</a></p>
        </div>
    </form>
    </div>
@endsection
