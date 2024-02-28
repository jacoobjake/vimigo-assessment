<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Playlist;
use App\Models\Genre;
use App\Models\UserFavourite;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function getUserSuggestion($user_id)
    {
        // Get the user's favourites
        $favourites = UserFavourite::where('user_id', $user_id)->get();

        $genres = [];
        $musics = [];
        // process the list of favourites
        foreach($favourites as $fav) {
            if($fav->favouritable instanceof Playlist) {
                $playlist = $fav->favouritable;
                $genres = array_merge($genres, $playlist->genres->pluck('id')->toArray());
                $musics = array_merge($genres, $playlist->musics->pluck('id')->toArray());
            }
            if($fav->favouritable instanceof Genre) {
                $genre = $fav->favouritable;
                $genres[] = $genre->id;
                $musics = array_merge($genres, $genre->musics->pluck('id')->toArray());
            }
            if($fav->favouritable instanceof Music) {
                $music = $fav->favouritable;
                $genres = array_merge($genres, $music->genres->pluck('id')->toArray());
                $musics[] = $music->id;
            }
        }

        $genres = array_unique($genres);
        $musics = array_unique($musics);

        // Get playlist related to user favourites
        $playlists = Playlist::where(function($query) use ($genres, $musics) {
            return $query->whereHas('genres', function($query) use ($genres) {
                    if(!empty($genres)) {
                        $query->whereIn('genres.id', $genres);
                    }
                    return $query;
                })
                ->orWhereHas('musics', function($query) use ($musics) {
                    if(!empty($musics)) {
                        $query->whereIn('musics.id', $musics);
                    }
                    return $query;
                });
        })->get();

        return response()->json([
            'playlists' => $playlists
        ]);
    }
}
