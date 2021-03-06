<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function requests(){
        return $this->belongsToMany(Request::class);
    }
}
