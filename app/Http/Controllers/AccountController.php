<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index() 
    {
        //tu bude index uživatelského profilu (asi nebude potřeba ale zrobit)
    }

    public function edit() 
    {
        //editace uživatelského účtu
    }

    public function update(Request $request) 
    {

        $user = $this->getUser();

        $user->update($request->validate([])); //validace

        return redirect('/account');
    }

    public function delete(Request $request) {
        //odstranění účtu
    }

    private function getUser() {
        return Auth::user();
    }

}
