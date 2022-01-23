<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSong extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['song_id', 'request_id'];
    protected $table = 'request_song';
}
