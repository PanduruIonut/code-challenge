<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Track</title>
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: sans-serif;
                height: 100vh;
                margin: 50px;
                position: absolute;
                top: 50%;
                left: 42%;
                -moz-transform: translateX(-50%) translateY(-50%);
                -webkit-transform: translateX(-50%) translateY(-50%);
                transform: translateX(-50%) translateY(-50%);
            }
            h1{
                text-align:center;
            }
            .full-height {
                height: 100vh;
            }
            img{
                border-radius:30px;
                width:300px;
                box-shadow: 10px 10px 5px #ccc;
            }

            .result {
            }
        </style>
    </head>
    <body>
        <div class="full-height">
            <div class="track">
                <?php
                    $followers = $results['followers']['total'];
                    $image = $results['images'][0]['url'];
                    $name = $results['name'];
                    $popularity = $results['popularity'];
                    $genres = $results['genres'];
                ?>
                <div>
                    <h1>{{$name}}</h1>
                    <img src="{{$image}}" />
                    <h2>Popularity: {{$popularity}}</h2>
                    <h2>Followers: {{$followers}}</h2>
                    <div>
                        Genres:
                        @foreach($genres as $genre)
                        <li>{{$genre}}</li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
