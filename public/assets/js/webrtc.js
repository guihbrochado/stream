document.addEventListener('DOMContentLoaded', function () {
    console.log("DOM fully loaded and parsed");
                console.log(window.isTransmitter);


    function initWebRTC(isTransmitter) {
        // Elementos do DOM
        const startButton = document.getElementById('startButton');
        const shareScreenButton = document.getElementById('shareScreenButton');
        const viewLiveButton = document.getElementById('viewLiveButton');
        const localVideo = document.getElementById('localVideo');
        const remoteVideo = document.getElementById('remoteVideo');
        const videoCover = document.getElementById('videoCover');

        // Servidores ICE
        const servers = {
            iceServers: [
                {
                    urls: ['stun:stun1.l.google.com:19302', 'stun:stun2.l.google.com:19302']
                }
            ]
        };

        // Conexão WebSocket
        const socket = new WebSocket('ws://localhost:6001/app/0?protocol=7&client=js&version=7.0&flash=false');

        // Configuração do WebRTC
        let peerConnection = new RTCPeerConnection(servers);

        // Candidatos ICE
        peerConnection.onicecandidate = event => {
            if (event.candidate) {
                socket.send(JSON.stringify({type: 'new-ice-candidate', candidate: event.candidate}));
            }
        };

        // Stream remoto
        peerConnection.ontrack = event => {
            remoteVideo.srcObject = event.streams[0];
        };

        // Mensagens do servidor de sinalização
        socket.onmessage = async function (event) {
            // Sua lógica para lidar com 'offer', 'answer' e 'new-ice-candidate'
        };

        // Funções de transmissão e compartilhamento de tela
        async function startTransmitting() {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
            localVideo.srcObject = stream;
            stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
            const offer = await peerConnection.createOffer();
            await peerConnection.setLocalDescription(offer);
            socket.send(JSON.stringify({ type: 'offer', offer }));
        }

        async function startScreenShare() {
            const stream = await navigator.mediaDevices.getDisplayMedia({ video: true });
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
        } else {
            startButton.style.display = 'none';
            shareScreenButton.style.display = 'none';
            viewLiveButton.onclick = function () {
                videoCover.style.display = 'none';
                remoteVideo.style.display = 'block';
                // Não precisa chamar play aqui pois isso será gerido pelo ontrack
            };
        }
    }

    // Certifique-se de que isTransmitter é definido globalmente antes deste script ser carregado
    initWebRTC(window.isTransmitter);
});