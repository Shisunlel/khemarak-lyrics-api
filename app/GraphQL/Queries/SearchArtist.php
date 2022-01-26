<?php

namespace App\GraphQL\Queries;

use App\Models\Artist;
use Illuminate\Support\Facades\DB;

class SearchArtist
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        if (strlen($args['name']) > 0) {
            $lower = strtolower($args['name']);
            return Artist::where(DB::raw('lower(name)'), 'like', "%{$lower}%")->take(5)->get();
        }
        return Artist::orderBy('id', 'desc')->take(5)->get();
    }
}
