<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['nazev'];
    protected $table = 'kategorie';

    public function post() {
        return $this->hasMany(Post::class, 'id', 'kategorie_id');
    }

}
