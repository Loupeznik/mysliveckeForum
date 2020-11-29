@extends('welcome')
@section('content')
    <div class="float-left" style="width: 820px">
        <h1>{{ $chatroom->nazev }}</h1>
        @if ($chatroom->admin_id == Auth::user()->ID)
            <div class="mt-3">
                <form class="align-items-center" method="POST" action="/chatroom">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <select name="uzivatel_id" class="form-control form-control-sm">
                                @foreach ($users as $user)
                                    <option value="{{ $user->ID }}">{{ $user->uzivatelske_jmeno }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="redirect" value="{{ $chatroom->ID }}">
                        <div class="col">
                            <input type="submit" class="btn btn-success btn-sm" value="Přidat uživatele">
                        </div>
                    </div>
                </form>
            </div>
        @endif
        <div class="container">
            <img src="/img/avatar.png" id="chat">
            <p>Čau. Ako sa dnes máš?</p>
            <span style="padding-left: 5px">Dušan</span>
            <span class="time-right">11:00 ✓</span>
        </div>

        <div class="container darker">
            <img src="/img/avatar.png" alt="Avatar" class="right" id="chat">
            <p>Ahoj. Hele jde to co ty?</p>
            <span class="time-left">11:01 ○</span>
        </div>

        <div class="container">
            <img src="/img/avatar.png" alt="Avatar" id="chat">
            <p>Tiež fajn. Ako sa darí v love, už sme si dlho nepísali.</p>
            <span style="padding-left: 5px">Dušan</span>
            <span class="time-right">11:02 ✓</span>
        </div>

        <div class="container darker">
            <img src="/img/avatar.png" alt="Avatar" class="right" id="chat">
            <p>Jo, minulou sobotu sme s Frantou střelili jelena. Mrkni se naň v galerii.</p>
            <span class="time-left">11:05 ○</span>
        </div>

        <div class="container">
            <img src="/img/avatar.png" alt="Avatar" id="chat">
            <p>Jasné mrknem sa na to.</p>
            <span style="padding-left: 5px">Dušan</span>
            <span class="time-right">11:06 ✓</span>
        </div>

        <div class="form-group" style="padding-top: 10px">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            <button type="submit" class="btn btn-primary float-right" style="margin-top: 10px">Odoslať</button>
        </div>
    </div>
    <div class="container float-right" style="width: 110px">
        <h6 style="text-align: center">Zoznam priateľov</h6>
        @foreach ($members as $member)
            <div class="container darker"><img class="zoznam" src="/img/avatar.png" alt="Avatar" id="chat"><a
                    href="/account/{{ $member->uzivatel_id }}" class="text-decoration-none @if ($chatroom->admin_id == $member->uzivatel_id) font-weight-bold text-dark @else text-secondary @endif"
                    style="padding-left: 8px">{{ $member->uzivatelske_jmeno }}</a></div>
        @endforeach
    </div>
@endsection
