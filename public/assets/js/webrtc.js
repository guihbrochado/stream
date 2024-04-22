// Inicializa o WebRTC dependendo se o usuário é o transmissor ou o receptor
window.initWebRTC = function (isTransmitter) {
    // Elementos do DOM para controle da transmissão e exibição de vídeos
    const startButton = document.getElementById('startButton');
    const shareScreenButton = document.getElementById('shareScreenButton');
    const viewLiveButton = document.getElementById('viewLiveButton');
    const localVideo = document.getElementById('localVideo');
    const remoteVideo = document.getElementById('remoteVideo');
    const videoCover = document.getElementById('videoCover');

    // Configuração de servidores ICE para ajudar na conexão peer-to-peer
    const servers = {
        iceServers: [
            {
                urls: ['stun:stun1.l.google.com:19302', 'stun:stun2.l.google.com:19302']
            }
        ]
    };

    // Cria uma nova conexão peer com a configuração de servidores ICE
    const peerConnection = new RTCPeerConnection(servers);

    // Quando um novo candidato ICE é encontrado, envia para o servidor de sinalização
    peerConnection.onicecandidate = event => {
        if (event.candidate) {
            socket.send(JSON.stringify({
                event: "ice-candidate",
                data: {
                    type: 'new-ice-candidate',
                    candidate: event.candidate
                }
            }));
        }
    };

    // Quando um stream remoto é adicionado, define o src do vídeo remoto para o stream
    peerConnection.ontrack = event => {
        remoteVideo.srcObject = event.streams[0];
    };

    // Inicia a transmissão de vídeo e áudio do usuário
    async function startTransmitting() {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
        localVideo.srcObject = stream;
        for (const track of stream.getTracks()) {
            peerConnection.addTrack(track, stream);
        }

        // Cria uma oferta e a envia para o servidor de sinalização
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

    // Inicia o compartilhamento de tela e substitui o track de vídeo da conexão
    async function startScreenShare() {
        const stream = await navigator.mediaDevices.getDisplayMedia({ video: true });
        localVideo.srcObject = stream;
        const videoTrack = stream.getTracks().find(track => track.kind === 'video');
        const sender = peerConnection.getSenders().find(s => s.track.kind === 'video');
        if (sender) {
            sender.replaceTrack(videoTrack);
        }
    }

    // Define as ações dos botões dependendo se é transmissor ou receptor
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

            socket.send(JSON.stringify({ event: "request-offer" }));
        });
    }

    // Conexão WebSocket com o servidor de sinalização
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

document.addEventListener('DOMContentLoaded', () => {

    console.log("DOM fully loaded and parsed");
    if (typeof window.initWebRTC === 'function' && !window.webRTCInitialized) {
        window.initWebRTC(window.isTransmitter);
        window.webRTCInitialized = true; // Marcar WebRTC como inicializado
    } else {
        console.error('initWebRTC is not a function, check webrtc.js file');
    }
});