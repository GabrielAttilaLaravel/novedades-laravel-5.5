<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['bio', 'twitter', 'github'];

    public function user()
    {
        // el perfil de usuario pertenece al usuario
        return $this->belongsTo(User::class);
    }

    public function getTwitterUrlAttribute()
    {
        return 'https://twitter.com/' . $this->twitter;
    }
}
