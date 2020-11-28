@extends('welcome')
@section('content')
    <h3 class="register">Registrácia nového užívateľa</h3>

    <p class="register">
        Povinné údaje sú meno, uživatelské jméno ktorý slúži ako login a heslo. Heslo sa
        dá po prihlásení zmeniť.
        Ďalšie osobné údaje vložené pri registrácii slúžia len pre chod tohto diskusného fóra, nie sú poskytované tretím
        osobám (s vynimkou Polície SR/ČR pri vyšetrovaní podozrení zo spáchania trestného činu alebo priestupku) bez súhlasu
        jej majiteľa. Je na každom užívateľovi, aby si verejne zobrazované osobné údaje nastavil podľa svojho uváženia.
        Ďalej odporúčame zadať aj korektné meno, obzvlášť v prípade kritiky a napádania ostatných, slušne a vecne
        diskutujúcich. K užívateľom bez zadaného mena sa bude pristupovať pri prípadných prehrešeniach prísnejšie.
        <br><br>
        <b>Na fórum sa ani neregistrujte, ak máte v úmysle hrubo napádať ostatní diskutujúci, sústavne narušovať témy
            svojimi mimotématickými príspevky alebo vykonávať inú činnosť narušujúce chod diskusného fóra, pretože po prvých
            náznakoch tejto činnosti budete z fóra odstránený!</b>
        <br><br>
        <b>Registrácia je dokončená až po schválení administrátorom, čo prebehne (väčšinou) do 24 hodín od registrácie.
            Dovtedy nebude možné sa prihlásiť a vkladať príspevky.</b>
    </p>
    <form method="POST" action="/register">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Meno</label>
                <input type="name" name="jmeno" class="form-control" id="inputName" value="{{old('jmeno')}}">
                @error('jmeno')
                    <p class="text-danger">{{$errors->first('jmeno')}}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputSurname">Priezvisko</label>
                <input type="surname" name="prijmeni" class="form-control" id="inputSurname" value="{{old('prijmeni')}}">
                @error('prijmeni')
                    <p class="text-danger">{{$errors->first('jmeno')}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="inputUsername">Uživatelské jméno</label>
            <input type="text" name="uzivatelske_jmeno" class="form-control" id="inputUsername" value="{{old('uzivatelske_jmeno')}}" required>
                @error('uzivatelske_jmeno')
                    <p class="text-danger">{{$errors->first('uzivatelske_jmeno')}}</p>
                @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Heslo</label>
                <input type="password" name="password" class="form-control" id="inputPassword4" required>
                @error('password')
                    <p class="text-danger">{{$errors->first('password')}}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword5">Heslo znovu</label>
                <input type="password" name="password_confirmation" class="form-control" id="inputPassword5" required>
                @error('password_confirmation')
                    <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrovať</button>
    </form>
@endsection
