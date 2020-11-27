<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'nazev',
        'obsah',
        'pridano',
        'uzivatel_id',
        'kategorie_id'
    ];
    protected $table = 'prispevek';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    
    public function user() {
        return $this->hasOne(User::class, 'ID', 'uzivatel_id');
    }

    public function category() {
        return $this->hasOne(Category::class, 'ID', 'kategorie_id');
    }
    
    public function response() {
        return $this->hasMany(Response::class, 'prispevek_id', 'ID');
    }

}
