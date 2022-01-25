<?php

namespace App\GraphQL\Queries;

use App\Models\Song;

class GetSongLyrics
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $artist = $args['artist'];
        $title = $args['title'];
        return Song::whereHas('artist', function($query) use ($artist){
            return $query->where('parse_name', $artist);
        })->where('parse_title', $title)->first();
    }
}
