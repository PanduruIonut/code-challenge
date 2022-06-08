<div class="container" id="home_container">
    <img class="container__img" src="https://play-lh.googleusercontent.com/eN0IexSzxpUDMfFtm-OyM-nNs44Y74Q3k51bxAMhTvrTnuA4OGnTi_fodN4cl-XxDQc" 
    alt="Spotify"
    width="100"
    height="100">
    <p class="container__button">
        <button onclick="userLogInRequest();">Authorize
    </button>
    </p>
</div>

<script>
    const userLogInRequest = () => {
        let logInUri = 'https://accounts.spotify.com/authorize' +
            '?client_id=50f16d08171741f782c1a4ccc38c572a' +
            '&response_type=code' +
            '&redirect_uri=http://127.0.0.1:8000/callback' +
            '&scope=app-remote-control user-top-read user-read-currently-playing user-read-recently-played streaming app-remote-control user-read-playback-state user-modify-playback-state' +
            '&show_dialog=true';
        window.open(logInUri, '_self');
    }
</script>
<style>
body{
        background-color: #191414;
    }
    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        -moz-transform: translateX(-50%) translateY(-50%);
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
    }
    .container__img{
        border-radius:73%;
        margin-left:25px
    }
    .container__button{
        margin-top: 24px;
        margin-left: -4px;
    }
    button{
        color:#191414;
        border-radius: 20px;
        border: 1px solid #191414;
        background-color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }
</style>
