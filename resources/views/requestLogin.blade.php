<?php
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
$_SESSION['spotify_token'] = $response;
    return redirect()->intended('/dashboard');
