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
        return Song::orderBy(DB::raw('RAND()'))->first();
    }
}
