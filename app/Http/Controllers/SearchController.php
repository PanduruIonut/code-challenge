<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function search(Request $request)
    {
        $query = $request->get('query');

        $client = new \GuzzleHttp\Client();
        $spotify_auth = $request->session()->get('spotify_auth');
        if($spotify_auth){
            $response = $client->request('GET', 'https://api.spotify.com/v1/search', [
                'headers' => [
                    'Authorization' => 'Bearer ' . json_decode($spotify_auth)->access_token,
                ],
                'query' => [
                    'q' => $query,
                    'type' => 'track,artist,album',
                    'limit' => '50',
                ],
            ]);

            return view('results')->with('results', json_decode($response->getBody()->getContents(), true));
        }else{
            return view('unauthorized');
        }
    }
    public function tracks(Request $request){
        $client = new \GuzzleHttp\Client();
        $spotify_auth = $request->session()->get('spotify_auth');
        if($spotify_auth){
            $url = 'https://api.spotify.com/v1';
            $url.=  $request->getRequestUri();
            $response = $client->request('GET', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . json_decode($spotify_auth)->access_token,
                ],
            ]);

            return view('track')->with('results', json_decode($response->getBody()->getContents(), true));
        }else{
            return view('unauthorized');
        }
    }
    public function albums(Request $request){
        $client = new \GuzzleHttp\Client();
        $spotify_auth = $request->session()->get('spotify_auth');
        if($spotify_auth){
            $url = 'https://api.spotify.com/v1';
            $url.=  $request->getRequestUri();
            $response = $client->request('GET', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . json_decode($spotify_auth)->access_token,
                ],
            ]);
            return view('album')->with('results', json_decode($response->getBody()->getContents(), true));
        }else{
            return view('unauthorized');
        }
    }
    public function artists(Request $request){
        $client = new \GuzzleHttp\Client();
        $spotify_auth = $request->session()->get('spotify_auth');
        if($spotify_auth){
            $url = 'https://api.spotify.com/v1';
            $url.=  $request->getRequestUri();
            $response = $client->request('GET', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . json_decode($spotify_auth)->access_token,
                ],
            ]);
            return view('artist')->with('results', json_decode($response->getBody()->getContents(), true));
        }else{
            return view('unauthorized');
        }
    }
}
