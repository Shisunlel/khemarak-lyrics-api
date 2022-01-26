<?php

namespace App\GraphQL\Queries;

use App\Models\Song;
use Illuminate\Support\Facades\DB;

class GetRandomSong
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // rand() - mysql, random() - pgsql
        return Song::orderBy(DB::raw('RANDOM()'))->first(); 
    }
}
