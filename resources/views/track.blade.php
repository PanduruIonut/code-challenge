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
                transform: translateX(-50%) translateY(-50%);
            }

            .full-height {
                height: 100vh;
            }
            h1{
                text-align:center;
            }
            .details{
                text-align:center;
            }
            audio{
                display:flex;
                margin-top:15px;
                margin-bottom:15px;
            }
            img{
                border-radius:30px;
                box-shadow: 10px 10px 5px #ccc;
            }
        </style>
    </head>
    <body>
        <div class="full-height">
            <div class="track">
                <?php
                    $data = [];
                    $preview_url = $results['preview_url'];
                    $image = $results['album']['images'][0]['url'];
                    $name = $results['name'];
                    $explicit = $results['explicit'];
                    $is_local = $results['is_local'];
                    $popularity = $results['popularity'];
                    $album = $results['album']['name'];
                ?>
                <div>
                    <h1>{{$name}}</h1>
                    <img src="{{$image}}" width="300" />
                    <audio controls="controls">
                        <source src={{$preview_url}} type="audio/mpeg"/>
                    </audio>
                    <div class="details">
                        <div><b>Album:</b> {{$album}}</div>
                        <div><b>Popularity:</b> {{$popularity}}</div>
                        <div><b>Is explicit:</b> {{$explicit}}</div>
                        <div><b>Is local:</b> {{$is_local = false ? 'true' : 'false'}}</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>