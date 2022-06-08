<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>album</title>
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
            .image-container{
                display:flex;
            }
            .image-container__details{
                margin-left:15px;
                align-self:center
            }
            img{
                border-radius:20px;
                box-shadow: 10px 10px 5px #ccc;
            }
        </style>
    </head>
    <body>
        <div class="full-height">
            <div class="album">
                <?php
                    $data = [];
                    $tracks = [];
                    $artists = [];
                    foreach($results['artists'] as $artist){
                        array_push($artists, $artist['name']);
                    }
                    foreach($results['tracks']['items'] as $track){
                        array_push($tracks, $track['name']);
                    }

                        $image = $results['images'][0]['url'];
                        $name = $results['name'];
                        $total_tracks = $results['total_tracks'];
                        $release_date = $results['release_date'];
                        $popularity = $results['popularity'];
                ?>
                <div>
                    <h1>{{$name}}</h1>
                    <div class="image-container">
                        <img src="{{$image}}" width="300"/>
                        <div class="image-container__details">
                            <div>Popularity: {{$popularity}}</div>
                            <div>Release date: {{$release_date}}</div>
                            <div>Total tracks: {{$total_tracks}}</div>
                        </div>
                    </div>
                    <ol>
                        <b>Tracks:</b>
                        @foreach($tracks as $track)
                            <li>{{$track}}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </body>
</html>
