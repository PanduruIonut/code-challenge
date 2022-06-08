<html>
    <head>
    </head>
    <body>
        <div class="search-form">
            <form method="post" action="/search">
                {{csrf_field()}}
                <input id="search-box" name="query" type="text" placeholder="Search" class="search-input" />
                <button class="search-button" type="submit">Go</button>

            </form>
        </div>
    </div>        
    </body>
</html>
<style>
    body{
        background-position: center;
        backdrop-filter: blur(5px);
        background-image:url({{asset('/img/background.jpeg')}});
    }
    .search-form {
        position: relative;
        top: 50%;
        left: 50%;
        width: 350px;
        height: 40px;
        border-radius: 40px;
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        transform: translate(-50%, -50%);
        background: #fff;
        transition: all 0.3s ease;
    }
    .search-input {
        position: absolute;
        top: 10px;
        left: 38px;
        font-size: 14px;
        background: none;
        color: #5a6674;
        width: 195px;
        height: 20px;
        border: none;
        appearance: none;
        outline: none;
    }
    .search-button {
    position: absolute;
    top: 10px;
    right: 15px;
    height: 20px;
    width: 20px;
    padding: 0;
    margin: 0;
    border: none;
    background: none;
    outline: none!important;
    cursor: pointer;
    }
</style>