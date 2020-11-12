<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{

    protected $fillable = [];
    protected $table = 'odpoved';
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

}
