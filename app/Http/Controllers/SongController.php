<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Request;
use App\Models\RequestSong;
use App\Models\Song;

class SongController extends Controller
{
    private $indexView = 'songs/index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::with('artist', 'album')->get();
        return view($this->indexView, compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSongRequest $request)
    {
        $newArtist = null;
        $album = null;
        // create new artist if not exist
        $artist = Artist::whereRaw('LOWER(name) LIKE ? ', [trim(strtolower($request->artist)) . '%'])->first();
        if (!isset($artist)) {
            $newArtist = Artist::create([
                'name' => $request->artist,
                'image' => 'https://res.cloudinary.com/shisun/image/upload/v1642926881/image/no-profile.jpg'
            ]);
        }
        // create if not exist and provided
        if (isset($request->album)) {
            // create new album if new artist
            if (isset($newArtist)) {
                $album = Album::create([
                    'artist_id' => $newArtist->id,
                    'name' => $request->album,
                    'cover' => 'https://res.cloudinary.com/shisun/image/upload/v1642926881/image/no-profile.jpg'
                ]);
            } else {
                $album = Album::whereRaw('LOWER(name) LIKE ? ', [trim(strtolower($request->album)) . '%'])->where('artist_id', $artist->id)->first();
                if (!isset($album)) {
                    $album = Album::create([
                        'artist_id' => $artist->id,
                        'name' => $request->album,
                        'cover' => 'https://res.cloudinary.com/shisun/image/upload/v1642926881/image/no-profile.jpg'
                    ]);
                }
            }
        }
        // create new song
        $song = $this->createSong($newArtist, $artist, $album, $request);

        // insert into pivot table with request_id and song_id
        RequestSong::insert([
            'request_id' => $request->request_id,
            'song_id' => $song->id
        ]);

        Request::where('id', $request->request_id)->update([
            'is_approved' => 1,
            'approved_at' => now()
        ]);

        return redirect()->route('songs.index');
    }

    private function createSong($newArtist = null, $artist, $album, $request)
    {
        return Song::create([
            'artist_id' => isset($newArtist) ? $newArtist->id : $artist->id,
            'album_id' => isset($album) ? $album->id : null,
            'title' => $request->title,
            'length' => $request->length ?? null,
            'track' => $request->track ?? null,
            'disc' => $request->disc ?? null,
            'lyrics' => $request->lyrics,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSongRequest  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSongRequest $request, Song $song)
    {
        $compressedImage = cloudinary()->upload($request->file('cover')->getRealPath(), [
            'folder' => 'image',
            'transformation' => [
                'width' => 500,
                'height' => 500,
                'crop' => 'limit',
                'quality' => 'auto',
                'fetch_format' => 'auto'
            ]
        ])->getSecurePath();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        //
    }

    public function updateById(UpdateSongRequest $request, $id)
    {
    }
}
