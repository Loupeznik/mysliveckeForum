<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatroomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //přes Eloquent nefungovalo, bylo nutné použít DB query
        $rooms = DB::table('chatroom_uzivatel')->join('uzivatel','uzivatel_id', '=', 'uzivatel.ID')->join('chatroom', 'chatroom_id', '=', 'chatroom.ID')->select(['chatroom.nazev', 'chatroom.ID'])->where('uzivatel_id', '=', Auth::user()->ID)->get();
        
        return view('chatroom.index', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nazev' => ['required', 'max:50'],
        ]);

        Chatroom::create([
            'nazev' => $request->nazev,
            'admin_id' => Auth::user()->ID,
        ]);

        $latest = Chatroom::where('admin_id', Auth::user()->ID)->latest('ID')->first();

        DB::table('chatroom_uzivatel')->insert(['uzivatel_id' => Auth::user()->ID, 'chatroom_id' => $latest->ID]);

        return redirect('/chat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('chatroom.chat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
