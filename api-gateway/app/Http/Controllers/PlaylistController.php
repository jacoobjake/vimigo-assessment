<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlaylistController extends Controller
{
    protected $serviceUrl;

    public function __construct()
    {
        $this->serviceUrl = config('app.playlist_service_url');
    }

    public function myPlaylistSuggestion()
    {
        $user = auth()->user();

        $response = Http::withUrlParameters([
            'endpoint' => $this->serviceUrl,
            'user_id' => $user->id,
        ])->get('{+endpoint}/suggestion/{user_id}');

        return $response->json();
    }
}
