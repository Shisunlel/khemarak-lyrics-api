<?php

namespace App\GraphQL\Queries;

use App\Models\Artist;
use Illuminate\Support\Facades\DB;

class GetHotArtists
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return Artist::join('songs', 'artists.id', 'artist_id')->groupBy('artists.id')->orderBy(DB::raw('max(songs.created_at)', 'desc'))->take(4)->get(array('name', 'image', 'artists.id'));
    }
}
