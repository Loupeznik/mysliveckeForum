<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        //uživatelský profil zalogovaného uživatele, možnost úpravy přes form, pak to jde na update funkci
        $user = $this->getUser(); 

        return view('auth.profile', compact('user'));

    }

    public function show(User $account)
    {

        //zobrazení profilu uživatele (veřejně přístupný)
        return view('auth.userProfile', compact('account'));

    }

    public function update(Request $request)
    {

        $user = User::where('id',$this->getUser()); //čekovat esi funguje
        $user->update($request); //doplnit

        return redirect('/account');
        
    }

    public function delete(User $account)
    {
        
        if ($this->getUser() == $account->id) {
            $account->delete();
            Auth::logout();
            return redirect('/');
        }
        else
        {
            return view('auth.error', compact('account')); //dorobit error page, bude psané že nemůže odstraňovat účet který není jeho
        }

    }

    private function getUser()
    {

        return Auth::user();

    }

}
