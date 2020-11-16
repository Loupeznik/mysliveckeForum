@auth
{{Auth::user()->uzivatelske_jmeno}}
@endauth

<form method="POST" action="/logout">
@csrf
<input type="submit" value="xd">
</form>
