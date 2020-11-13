<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{

    protected $fillable = [];
    protected $table = 'odpoved';
    
    public function user() {
        return $this->hasOne(User::class, 'ID', 'uzivatel_id');
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

}
