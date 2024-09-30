require('./bootstrap');
import Echo from "laravel-echo";

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '74e6ceca206e76c1d2c6',
    cluster: 'eu',
    forceTLS: true
});

window.Echo.channel('live-stream')
    .listen('ScreenShare', (e) => {
        console.log(e.screenShareData);
        const remoteVideo = document.getElementById('remoteVideo');
        if (remoteVideo) {
            remoteVideo.srcObject = new MediaStream(e.screenShareData.tracks);
        }
    });
