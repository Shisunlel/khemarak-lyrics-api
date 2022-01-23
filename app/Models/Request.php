<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function songs(){
        return $this->belongsToMany(Song::class);
    }

    public function scopeNotApproved($query){
        return $query->where('is_approved', 0);
    }

}
