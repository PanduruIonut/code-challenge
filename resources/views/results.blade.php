<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Code Challenge</title>
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: sans-serif;
                height: 100vh;
                margin: 50px;
            }

            .full-height {
                height: 100vh;
            }
            .data {
                display:flex;
            }
            a:link { text-decoration: none; color: black}
            a:visited { text-decoration: none; color: black}
            a:hover { text-decoration: none; color: black}
            a:active { text-decoration: none; color: black}
            ol{
                display:flex;
                align-items:center;
                padding:0px;
                margin-left:15px;
            }
            a{
                margin-left:15px;
            }
            img{
                border-radius: 10px;
                width: 64px;
                height: 64px;
                box-shadow: 10px 10px 5px #ccc;
            }
        </style>
    </head>
    <body>
        <div class="full-height">
            <div class="result">
                <?php
                    $artists = [];
                    $albums = [];
                    $tracks = [];
                    foreach ($results['tracks']['items'] as $id => $item){
                        if(
                            isset($item['id']) &&
                            isset($item['name']) &&
                            isset($item['album']['images'][2]['url'])
                        ){
                            array_push($tracks, ['id' => $item['id'], 'name' => $item['name'], 'img' => $item['album']['images'][2]['url']]);
                        }
                    }
                    foreach($results['albums']['items'] as $id => $item){
                        if(
                            isset($item['id']) &&
                            isset($item['name']) &&
                            isset($item['images'][2]['url'])
                        ){
                        array_push($albums, ['id' => $item['id'], 'name' => $item['name'], 'img' => $item['images'][2]['url']]);
                        }
                    }
                    foreach($results['artists']['items'] as $id => $item){
                        if(
                            isset($item['images'][0]['url'])
                            && isset($item['name'])
                            && isset($item['id'])
                            ){
                            array_push($artists, ['id' => $item['id'], 'name' => $item['name'], 'img' => $item['images'][2]['url']]);
                        }
                    }
                ?>
                <div class="data">
                    <div>
                    <h1>Albums</h1>
                        @foreach($albums as $album)
                        <ol class="test">
                            <a href="/albums/{{ $album['id'] }}"><img src="{{$album['img']}}" /></a>
                            <a href="/albums/{{ $album['id'] }}">{{$album['name']}}</a>
                        </ol>
                        @endforeach
                </div>
                <div>
                    <h1>Tracks</h1>
                        @foreach($tracks as $track)
                        <ol>
                            <a href="/tracks/{{ $track['id'] }}" method="POST" action="/tracks"><img src="{{$track['img']}}" /></a>
                            <a href="/tracks/{{ $track['id'] }}" method="POST" action="/tracks">{{$track['name']}}</a>
                        </ol>
                        @endforeach
                </div>
                <div>
                    <h1>Artists</h1>
                        @foreach($artists as $artist)
                        <ol>
                            <a href="/artists/{{ $artist['id'] }}" method="POST" action="/tracks"><img src="{{$artist['img']}}" /></a>
                            <a href="/artists/{{ $artist['id'] }}" method="POST" action="/tracks">{{$artist['name']}}</a>
                        </ol>
                        @endforeach
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
