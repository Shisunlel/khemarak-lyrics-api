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
        $artist = ucwords(str_replace('-', ' ', $args['artist']));
        $title = ucfirst(str_replace('-', ' ', $args['title']));
        return Song::whereHas('artist', function($query) use ($artist){
            return $query->where('name', $artist);
        })->where('title', $title)->first();
    }
}
