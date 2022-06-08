<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class UserController extends Controller
{
    private const SPOTIFY_API_TOKEN_URL = 'https://accounts.spotify.com/api/token';

    public function login(){
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post(self::SPOTIFY_API_TOKEN_URL, [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Accepts' => 'application/json',
                    'Authorization' => 'Basic '.base64_encode($this->clientId.':'.$this->clientSecret),
                ],
                'form_params' => [
                    'grant_type' => 'client_credentials',
                ],
            ]);
        } catch (RequestException $e) {
            $errorResponse = json_decode($e->getResponse()->getBody()->getContents());
            $status = $e->getCode();
            $message = $errorResponse->error;
        }

        $body = json_decode((string) $response->getBody());

        Cache::remember('spotifyAccessToken', $body->expires_in, function () use ($body) {
            return $body->access_token;
        });
    }

    public function callback(Request $request){
        $url = 'https://accounts.spotify.com/api/token';
        $submit_post_fields = 'grant_type=authorization_code&code=' . $_GET['code'];
        $submit_post_fields .= '&redirect_uri=http://127.0.0.1:8000/callback';

        $access_token = "Basic " . base64_encode("50f16d08171741f782c1a4ccc38c572a:bafde9b0bfd64002a5b646ab7a0e8abf");
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', $url, [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Accepts' => 'application/x-www-form-urlencoded',
                    'Authorization' => $access_token,
                ],
                'body' => $submit_post_fields
            ]);
        } catch (RequestException $e) {
            $errorResponse = json_decode($e->getResponse()->getBody()->getContents());
            $status = $e->getCode();
            $message = $errorResponse->error;
        }
        $request->session()->put('spotify_auth', $response->getBody()->getContents());
        return redirect()->intended('/dashboard');
    }

    public function dashboard(){
        return view('dashboard');
    }
}
