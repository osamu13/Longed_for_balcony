let tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
let firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('js-main-movie', {
        height: '100vh',
        width: '100vw',
        videoId: '2qM7kvUjPeE',
        playerVars: {
            controls: 0,
            autoplay: 1,
            disablekb: 1,
            enablejsapi: 1,
            iv_load_policy: 3,
            playsinline: 1,
            rel: 0
        },
        events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
        }
    });
}

function onPlayerReady(event) {
    event.target.mute(); //muteにしないとモバイルで自動再生されない
    event.target.playVideo();
}

function onPlayerStateChange(event) {
    let ytStatus = event.target.getPlayerState();
    if (ytStatus == YT.PlayerState.ENDED) {
        player.mute(); //muteにしないとモバイルで自動再生されない
        player.playVideo();
    }
}