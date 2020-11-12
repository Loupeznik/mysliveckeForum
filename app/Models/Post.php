<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [];
    protected $table = 'prispevek';
    
    public function user() {
        return $this->hasOne(User::class, 'id', 'uzivatel_id');
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'kategorie_id');
    }
    
    public function response() {
        return $this->hasMany(Response::class, 'id', 'prispevek_id');
    }

}
