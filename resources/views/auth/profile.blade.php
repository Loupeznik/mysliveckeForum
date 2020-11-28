@extends('welcome')
@section('content')
    <h1>Uživatelský profil</h1>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card border-dark">
                        <img class="card-img-top" src="/img/avatar.png" alt="personalPic" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Osobní údaje</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Uživatelské jméno: {{ $user->uzivatelske_jmeno }}</li>
                                <li class="list-group-item">Jméno: {{ $user->jmeno }}</li>
                                <li class="list-group-item">Příjmení: {{ $user->prijmeni }}</li>
                                <li class="list-group-item">Datum registrace:
                                    {{ date('d.m.Y', strtotime($user->datum_registrace)) }}
                                </li>
                            </ul>
                            <div class="mt-2">
                                <button data-toggle="collapse" data-target="#udaje_zmena"
                                    class="btn btn-primary align-left">Změnit osobní údaje</button>
                                <button data-toggle="collapse" data-target="#heslo_zmenit"
                                    class="btn btn-primary align-right disabled" disabled>Změnit heslo</button>
                                <button data-toggle="collapse" data-target="#ucet_zrusit"
                                    class="btn btn-danger align-right">Zrušit účet</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="collapse" id="udaje_zmena">
                        <form method="POST" action="/account/{{ Auth::user()->ID }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Jméno</label>
                                <input class="form-control" type="text" placeholder="Jméno" value="{{ $user->jmeno }}"
                                    name="jmeno">
                            </div>
                            <div class="form-group">
                                <label>Příjmení</label>
                                <input class="form-control" type="text" placeholder="Příjmení" value="{{ $user->prijmeni }}"
                                    name="prijmeni">
                            </div>
                            <div class="form-group">
                                <label>Profilový obrázek</label>
                                <select class="form-control" name="profilove_foto" disabled>
                                    <option value="avatar.png">Myslivec 1</option>
                                </select>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Změnit osobní údaje">
                        </form>
                    </div>
                    <div class="collapse mt-3" id="ucet_zrusit">
                        <form method="POST" action="/user">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <label>Zadejte stávající heslo pro kontrolu</label>
                                <input class="form-control" type="password" name="oldpass"
                                    placeholder="Pro ověření zadejte stávající heslo">
                            </div>
                            <div class="mt-2">
                                <input class="btn btn-danger" type="submit" value="Zrušit účet">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
