@extends('welcome')
@section('content')
    <div class="float-left" style="width: 820px">
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
        <div class="container darker"><a href="#"><img class="zoznam" src="/img/avatar.png" alt="Avatar" id="chat"></a><a
                style="padding-left: 8px">Dušan</a></div>
        <div class="container darker"><a href="#"><img src="/img/avatar.png" alt="Avatar" id="chat"></a><a
                style="padding-left: 2px"> Dominik </a></div>
        <div class="container darker"><a href="#"><img src="/img/avatar.png" alt="Avatar" id="chat"></a><a
                style="padding-left: 4px"> Vojtěch </a></div>
        <div class="container darker"><a href="#"><img src="/img/avatar.png" alt="Avatar" id="chat"></a><a
                style="padding-left: 5px"> Jerguš </a></div>
        <div class="container darker"><a href="#"><img src="/img/avatar.png" alt="Avatar" id="chat"></a><a
                style="padding-left: 8px"> Pavel </a></div>
    </div>
@endsection
