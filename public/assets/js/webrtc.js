document.addEventListener('DOMContentLoaded', function () {
    console.log("DOM fully loaded and parsed");

    // DOM elements
    const startButton = document.getElementById('startButton');
    const shareScreenButton = document.getElementById('shareScreenButton');
    const viewLiveButton = document.getElementById('viewLiveButton');
    const localVideo = document.getElementById('localVideo');
    const remoteVideo = document.getElementById('remoteVideo');
    const videoCover = document.getElementById('videoCover'); // Define videoCover here

    // Role determination
    let isTransmitter = window.isTransmitter;

    // Signaling server connection
    const socket = new WebSocket('ws://localhost:6001/app/0?protocol=7&client=js&version=7.0&flash=false');

    // WebRTC setup
    let peerConnection = new RTCPeerConnection({
        iceServers: [{urls: 'stun:stun.l.google.com:19302'}]
    });

    // Handling ICE candidates
    peerConnection.onicecandidate = event => {
        if (event.candidate) {
            socket.send(JSON.stringify({type: 'new-ice-candidate', candidate: event.candidate}));
        }
    };

    // Setting remote stream
    peerConnection.ontrack = event => {
        console.log('Track event:', event);
        const [remoteStream] = event.streams;
        console.log('Remote stream:', remoteStream);
        remoteVideo.srcObject = remoteStream;
        remoteVideo.onloadedmetadata = () => {
            console.log('Remote video is now playing');
            remoteVideo.play().catch(console.error);
        };
    };

    // Handle messages from signaling server
    socket.onmessage = async function (event) {
        const message = JSON.parse(event.data);

        switch (message.type) {
            case 'offer':
                if (!isTransmitter) {
                    await peerConnection.setRemoteDescription(new RTCSessionDescription(message.offer));
                    const answer = await peerConnection.createAnswer();
                    await peerConnection.setLocalDescription(answer);
                    socket.send(JSON.stringify({type: 'answer', answer}));
                }
                break;
            case 'answer':
                if (isTransmitter) {
                    await peerConnection.setRemoteDescription(new RTCSessionDescription(message.answer));
                }
                break;
            case 'new-ice-candidate':
                await peerConnection.addIceCandidate(new RTCIceCandidate(message.candidate));
                break;
        }
    };

    //if (!isTransmitter) {
    // Hide transmitter-specific buttons
    //  console.log('não sou trasmissor')
    //  startButton.style.display = 'none';
    //  shareScreenButton.style.display = 'none';
    //  
    //  console.log('cheguei aqui');

    // Make the 'Assistir Live' button visible
    //  viewLiveButton.style.display = 'block';
    //  viewLiveButton.addEventListener( 'click', function() {
    //      console.log('clicou');
    // Hide the video cover and show the remote video when 'Assistir Live' is clicked
    //      videoCover.style.display = 'none'; // Correctly references videoCover now
    //      remoteVideo.style.display = 'block';



    //      remoteVideo.play().then(() => {
    //          viewLiveButton.style.display = 'none';
    //          console.log('Live streaming has started.');
    //      }).catch(error => {
    //          console.error('Error starting live stream:', error);
    //      });
    //  });
    //}

    if (!isTransmitter) {
        viewLiveButton.addEventListener('click', function () {
            console.log('Assistir Live button clicked');
            videoCover.style.display = 'none';
            remoteVideo.style.display = 'block';

            remoteVideo.play().then(() => {
                viewLiveButton.style.display = 'none';
                console.log('Live streaming has started.');
            }).catch(error => {
                console.error('Error starting live stream:', error);
                // Adicione um tratamento aqui para lidar com bloqueio de autoplay, por exemplo, pedindo ao usuário para clicar novamente.
            });
        });
    }

    // Transmitter's actions
    if (isTransmitter) {
        // Bind start and share screen buttons
        console.log('trasmissor');
        startButton.onclick = startTransmitting;
        shareScreenButton.onclick = startScreenShare;
    } else {
        // Hide transmitter buttons for viewers
        startButton.style.display = 'none';
        shareScreenButton.style.display = 'none';

        // Setup view live button for viewers
        viewLiveButton.style.display = 'block';
        viewLiveButton.onclick = function () {
            remoteVideo.play().then(() => viewLiveButton.style.display = 'none');
        };
    }

    console.log(isTransmitter);



    async function startTransmitting() {
        const stream = await navigator.mediaDevices.getUserMedia({video: true, audio: true});
        localVideo.srcObject = stream;
        stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
    }

    async function startScreenShare() {
        const stream = await navigator.mediaDevices.getDisplayMedia({video: true});
        localVideo.srcObject = stream;
        const sender = peerConnection.getSenders().find(s => s.track.kind === 'video');
        if (sender)
            sender.replaceTrack(stream.getTracks()[0]);
    }
});