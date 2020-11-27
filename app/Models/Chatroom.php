<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{

    protected $fillable = [
        'nazev',
        'admin_id'
    ];

    protected $table = 'chatroom';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    public function user() {
        return $this->belongsToMany(User::class, 'chatroom_uzivatel', 'uzivatel_id', 'chatroom_id');
    }

}
