<?php

namespace Tests\Unit;

use App\Models\Artist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtistTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_artist()
    {
        $artist = Artist::factory()->create();
        $this->assertModelExists($artist);
    }

    public function test_create_artist_with_albums()
    {
        $artist = Artist::factory()
            ->hasAlbums(3)
            ->create();

        $this->assertModelExists($artist);
        $this->assertDatabaseCount('albums', 3);
    }

    public function test_create_artist_with_songs()
    {
        $artist = Artist::factory()
            ->hasSongs(5, [
                'album_id' => null
            ])
            ->create();
        $this->assertModelExists($artist);
        $this->assertDatabaseCount('songs', 5);
    }
}
