<?php

namespace Database\Seeders;

use App\Models;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $genres = [
            [
                'id' => 1,
                'name' => 'Pop-rock',
                'Description' => 'Pop rock music',
            ],
            [
                'id' => 2,
                'name' => 'Low-Fi',
                'Description' => 'Low Fi Music',
            ],
            [
                'id' => 3,
                'name' => 'R & B',
                'Description' => 'R & B Music',
            ],
        ];
        
        if(!Models\Genre::count()) {
            foreach($genres as $g) {
                $genre = Models\Genre::create($g);
            }

            $genre->userFavourites()->create([
                'user_id' => 1
            ]);
        }

        $playlists = [
            [
                'id' => 1,
                'name' => 'Pop-rock Play List',
                'Description' => 'Pop rock music compilation',
                'genres' => [
                    1
                ],
            ],
            [
                'id' => 2,
                'name' => 'R&B Playlist',
                'Description' => 'R&B musics collection',
                'genres' => [
                    3
                ],
            ],
            [
                'id' => 3,
                'name' => 'Low-Fi Playlist',
                'Description' => 'Low-Fi musics collection',
                'genres' => [
                    3
                ],
            ],
            [
                'id' => 4,
                'name' => 'Pop Rock R&B',
                'Description' => 'R & B and Pop ROck',
                'genres' => [
                    1,3
                ],
            ],
        ];

        if(!Models\Playlist::count()) {
            foreach($playlists as $pl) {
                $data = array_diff_key($pl, [
                    'genres' => 1
                ]);
                $playlist = Models\Playlist::create($data);
                $playlist->genres()->sync($pl['genres']);
            }

            $playlist->userFavourites()->create([
                'user_id' => 1
            ]);
        }

        $musics = [
            [
                'id' => 1,
                'name' => 'Pop rock music 1',
                'Description' => 'Pop rock music',
                'genres' => [
                    1
                ],
                'playlists' => [
                    1, 4
                ],
            ],
            [
                'id' => 2,
                'name' => 'Pop rock music 1',
                'Description' => 'Pop rock music',
                'genres' => [
                    1
                ],
                'playlists' => [
                    1
                ],
            ],
            [
                'id' => 3,
                'name' => 'Pop rock music 1',
                'Description' => 'Pop rock music',
                'genres' => [
                    1
                ],
                'playlists' => [
                    1, 4
                ],
            ],
            [
                'id' => 4,
                'name' => 'Low Fi Music 1',
                'Description' => 'Low Fi Music',
                'genres' => [
                    2
                ],
                'playlists' => [
                    3
                ],
            ],
            [
                'id' => 5,
                'name' => 'Low Fi Music 2',
                'Description' => 'R & B Music',
                'genres' => [
                    2
                ],
                'playlists' => [
                    3
                ],
            ],
            [
                'id' => 6,
                'name' => 'Low Fi R&B Music 1',
                'Description' => 'R & B Music',
                'genres' =>  [
                    2, 3
                ],
                'playlists' => [
                    2, 4
                ],
            ],
        ];

        if(!Models\Music::count()) {
            foreach($musics as $m) {
                $data = array_diff_key($m, [
                    'genres' => 1,
                    'playlists' => 1
                ]);
                $music = Models\Music::create($data);
                $music->genres()->sync($m['genres']);
                $music->playlists()->sync($m['playlists']);
            }

            $music->userFavourites()->create([
                'user_id' => 1
            ]);
        }
    }
}
