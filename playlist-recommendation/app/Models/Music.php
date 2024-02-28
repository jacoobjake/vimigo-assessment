<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics';

    use HasFactory;

    protected $guarded = [];
    protected $with = [
        'genres',
    ];

    public function genres()
    {
        return $this->morphToMany(Genre::class, 'model', 'model_has_genre')->without(['musics', 'playlists']);
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_musics')->without(['genres', 'musics']);
    }

    public function userFavourites()
    {
        return $this->morphMany(UserFavourite::class, 'favourite');
    }
}
