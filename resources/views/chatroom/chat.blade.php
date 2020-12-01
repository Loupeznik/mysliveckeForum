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
                                <option value="0">Vyberte uživatele k přidání</option>
                                @foreach ($users as $user)
                                    @if ($members->contains('uzivatel_id', $user->ID))
                                        @continue
                                    @else
                                    <option value="{{ $user->ID }}">{{ $user->uzivatelske_jmeno }}</option>
                                    @endif
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
        @forelse ($messages as $message)
        <div class="container @if ($message->uzivatel_id == Auth::user()->ID) darker @endif">
            <img src="/img/avatar.png" id="chat" @if ($message->uzivatel_id == Auth::user()->ID) class="right" @endif>
            <p>{{ $message->obsah }}</p>
            @if ($message->uzivatel_id != Auth::user()->ID)
            <span style="padding-left: 5px">{{ $message->User->uzivatelske_jmeno }}</span>
            @endif
        <span class="time-right">{{ date('d.m.Y H:i', strtotime($message->odeslano)) }}</span>
        </div>
        @empty
        <div class="container border-danger text-center">
            <p class="text-danger">Místnost neobsahuje žádné zprávy</p>
        </div>
        @endforelse
        @if ($messages->isNotEmpty())
        <div class="form-group" style="padding-top: 10px">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            <button type="submit" class="btn btn-primary float-right" style="margin-top: 10px" disabled>Odoslať</button>
        </div>
        @endif
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
