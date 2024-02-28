<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = [
        'musics',
        'playlists',
    ];

    public function musics()
    {
        return $this->morphedByMany(Music::class, 'model', 'model_has_genre')->without(['genres', 'playlists']);
    }

    public function playlists()
    {
        return $this->morphedByMany(Playlist::class, 'model', 'model_has_genre')->without(['genres', 'musics']);
    }

    public function userFavourites()
    {
        return $this->morphMany(UserFavourite::class, 'favourite');
    }
}
