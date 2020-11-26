<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{

    protected $fillable = [
        'obsah',
        'odeslano',
        'uzivatel_id',
        'prispevek_id',
    ];
    protected $table = 'odpoved';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    
    public function user() {
        return $this->hasOne(User::class, 'ID', 'uzivatel_id');
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

}
