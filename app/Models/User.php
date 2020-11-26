<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    //use HasProfilePhoto;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uzivatelske_jmeno',
        'heslo',
        'datum_registrace',
        'jmeno',
        'prijmeni',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'heslo',
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'datum_registrace' => 'date',
    ];

    protected $table = 'uzivatel';
    public $timestamps = false; //tabulka uzivatel nemá updated_at pole
    protected $primaryKey = 'ID'; //aby fungoval auth

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profilove_foto',
    ];

    /*
    public function getAuthPassword()
    {
        return $this->heslo;
    }
    */

    public function response() {
        return $this->hasMany(Response::class, 'id', 'uzivatel_id');
    }

    public function post() {
        return $this->hasMany(Post::class, 'id', 'uzivatel_id');
    }
}
