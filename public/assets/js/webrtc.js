window.initWebRTC = function (isTransmitter) {
    // Elementos do DOM
    const startButton = document.getElementById('startButton');
    const shareScreenButton = document.getElementById('shareScreenButton');
    const viewLiveButton = document.getElementById('viewLiveButton');
    const localVideo = document.getElementById('localVideo');
    const remoteVideo = document.getElementById('remoteVideo');
    const videoCover = document.getElementById('videoCover');

    const servers = {
        iceServers: [
            {
                urls: ['stun:stun1.l.google.com:19302', 'stun:stun2.l.google.com:19302']
            }
        ]
    };

    // Configuração do WebRTC
    const peerConnection = new RTCPeerConnection(servers);

    // Candidatos ICE
    peerConnection.onicecandidate = event => {
        if (event.candidate) {
            // Inclua a propriedade 'event' esperada pelo servidor de sinalização
            socket.send(JSON.stringify({
                event: "ice-candidate", // O valor 'ice-candidate' é apenas um exemplo. Substitua pelo valor correto esperado pelo seu servidor.
                data: {
                    type: 'new-ice-candidate',
                    candidate: event.candidate
                }
            }));
        }
    };

    // Stream remoto
    peerConnection.ontrack = event => {
        remoteVideo.srcObject = event.streams[0];
    };

    // Funções de transmissão e compartilhamento de tela
    async function startTransmitting() {
        const stream = await navigator.mediaDevices.getUserMedia({video: true, audio: true});
        localVideo.srcObject = stream;
        for (const track of stream.getTracks()) {
            peerConnection.addTrack(track, stream);
        }

        const offer = await peerConnection.createOffer();
        await peerConnection.setLocalDescription(offer);
        socket.send(JSON.stringify({
            event: "offer", // Substitua pelo valor correto esperado pelo seu servidor.
            data: {
                type: 'offer',
                offer: offer
            }
        }));
    }

    async function startScreenShare() {
        const stream = await navigator.mediaDevices.getDisplayMedia({video: true});
        localVideo.srcObject = stream;
        const videoTrack = stream.getTracks().find(track => track.kind === 'video');
        const sender = peerConnection.getSenders().find(s => s.track.kind === 'video');
        if (sender) {
            sender.replaceTrack(videoTrack);
        }
    }

    // Configurar ações baseadas no papel do usuário
    if (isTransmitter) {
        startButton.onclick = startTransmitting;
        shareScreenButton.onclick = startScreenShare;
        viewLiveButton.style.display = 'none';
        console.log('entrei no admin');
    } else {
        document.getElementById('viewLiveButton').addEventListener('click', function () {
            console.log('Espectador solicitando oferta');
            videoCover.style.display = 'none';
            remoteVideo.style.display = 'block';

            socket.send(JSON.stringify({event: "request-offer"}));
        });
    }

    const socket = new WebSocket('ws://localhost:6001/app/0?protocol=7&client=js&version=7.0&flash=false');

    socket.onerror = function (event) {
        console.error('WebSocket error:', event);
    };

    socket.onclose = function (event) {
        console.log('WebSocket connection closed:', event);
    };

// Mensagens do servidor de sinalização
    socket.onmessage = async event => {
        const message = JSON.parse(event.data);

        if (!isTransmitter) {
            if (message.event === 'offer') {
                console.log('Oferta Recebida');
                await peerConnection.setRemoteDescription(new RTCSessionDescription(message.data.offer));
                const answer = await peerConnection.createAnswer();
                await peerConnection.setLocalDescription(answer);
                socket.send(JSON.stringify({
                    event: "answer",
                    data: {
                        type: 'answer',
                        answer: answer
                    }
                }));
            } else if (message.event === 'ice-candidate') {
                await peerConnection.addIceCandidate(new RTCIceCandidate(message.candidate));
            } else {
                console.log('Unknown message type or message is not for this client:', message.type);
            }
        }
    };
};

// Conexão WebSocket


document.addEventListener('DOMContentLoaded', () => {
    
    console.log("DOM fully loaded and parsed");
    if (typeof window.initWebRTC === 'function' && !window.webRTCInitialized) {
        window.initWebRTC(window.isTransmitter);
        window.webRTCInitialized = true; // Marcar WebRTC como inicializado
    } else {
        console.error('initWebRTC is not a function, check webrtc.js file');
    }
});