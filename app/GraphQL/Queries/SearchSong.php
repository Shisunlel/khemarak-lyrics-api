<?php

namespace App\GraphQL\Queries;

use App\Models\Song;
use Illuminate\Support\Facades\DB;

class SearchSong
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        if(strlen($args['title'])){
            $lower = strtolower($args['title']);
            return Song::where(DB::raw('lower(title)'), 'like', "%{$lower}%")->take(5)->get();
        }
        return [];
    }
}
