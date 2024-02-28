<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = [
        'musics',
        'genres',
    ];

    public function musics()
    {
        return $this->belongsToMany(Music::class, 'playlist_musics')->without(['genres', 'playlists']);
    }

    public function genres()
    {
        return $this->morphToMany(Genre::class, 'model', 'model_has_genre')->without(['musics', 'playlists']);
    }

    public function userFavourites()
    {
        return $this->morphMany(UserFavourite::class, 'favourite');
    }
}
