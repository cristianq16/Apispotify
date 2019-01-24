<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cache;
use Session;
use SpotifyWebAPI;
use View;
use GuzzleHttp\Client;

class artistasController extends Controller
{
    private $spotifyApi;
    private $spotifyClient;
    private $spotifyChart;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (!Cache::has('accessToken')) {
            // Create the Spotify Client
            $this->spotifyClient = new SpotifyWebAPI\Session(
                env('SPOTIFY_CLIENT_ID'),
                env('SPOTIFY_CLIENT_SECRET')
            );

            // Attempt to get client_credentials token
            if ($this->spotifyClient->requestCredentialsToken()) {
                $tokenExpiryMinutes = floor(($this->spotifyClient->getTokenExpiration() - time()) / 60);

                Cache::put(
                    'accessToken',
                    $this->spotifyClient->getAccessToken(),
                    $tokenExpiryMinutes
                );
            }
        }

        // Use access token to connect to API
        $this->spotifyApi = new SpotifyWebAPI\SpotifyWebAPI();
        $this->spotifyApi->setAccessToken(Cache::get('accessToken'));

        $tracks = $this->spotifyApi->getArtistTopTracks($id, [
            'country' => 'co',
        ]);
        
        $artist = $this->spotifyApi->getArtist($id);

        return view('artistas.index', compact('tracks', 'artist'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
