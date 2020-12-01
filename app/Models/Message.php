<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    protected $fillable = [
        'obsah',
        'odeslano',
        'chatroom_id',
        'uzivatel_id'
    ];

    protected $table = 'zprava';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    public function User() {
        return $this->hasOne(User::class, 'ID', 'uzivatel_id');
    }

    public function Chatroom() {
        return $this->hasOne(Chatroom::class, 'ID', 'chatroom_id');
    }

}
