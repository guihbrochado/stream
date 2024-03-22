document.getElementById('startButton').addEventListener('click', start);

let peerConnection;
const config = {
    iceServers: [{ urls: 'stun:stun.l.google.com:19302' }]
};


const socket = new WebSocket('ws://localhost:6001/app/0?protocol=7&client=js&version=7.0&flash=false');

socket.onmessage = function(event) {
    const message = JSON.parse(event.data);
    onSignalingMessageReceived(message);
};

async function start() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
        document.getElementById('localVideo').srcObject = stream;

        peerConnection = new RTCPeerConnection(config);

        stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));

        peerConnection.ontrack = (event) => {
            document.getElementById('remoteVideo').srcObject = event.streams[0];
        };

        peerConnection.onicecandidate = (event) => {
            if (event.candidate) {
                sendSignalingMessage({ type: 'new-ice-candidate', candidate: event.candidate });
            }
        };

        // Remova a chamada automática da função 'call' se você deseja iniciar a chamada com alguma outra ação
        call();
    } catch (error) {
        console.error('Erro ao acessar a câmera/microfone:', error);
    }
}

function call() {
    peerConnection.createOffer().then(offer => {
        return peerConnection.setLocalDescription(offer);
    }).then(() => {
        sendSignalingMessage({ type: 'offer', offer: peerConnection.localDescription });
    }).catch(handleError);
}

function handleOffer(offer) {
    peerConnection.setRemoteDescription(new RTCSessionDescription(offer)).then(() => {
        // Removido a chamada duplicada para getUserMedia que não é necessária aqui
        return peerConnection.createAnswer();
    }).then(answer => {
        return peerConnection.setLocalDescription(answer);
    }).then(() => {
        sendSignalingMessage({ type: 'answer', answer: peerConnection.localDescription });
    }).catch(handleError);
}

function handleAnswer(answer) {
    const remoteDesc = new RTCSessionDescription(answer);
    peerConnection.setRemoteDescription(remoteDesc).catch(handleError);
}

function handleNewICECandidate(candidate) {
    peerConnection.addIceCandidate(new RTCIceCandidate(candidate)).catch(handleError);
}

function sendSignalingMessage(message) {
    // Garanta que o socket está conectado antes de tentar enviar uma mensagem
    if (socket.readyState === WebSocket.OPEN) {
        socket.send(JSON.stringify(message));
    } else {
        console.error("Socket não está aberto.");
    }
}

function handleError(error) {
    console.error('Encontrado um erro:', error);
}

function onSignalingMessageReceived(message) {
    switch (message.type) {
        case 'offer':
            handleOffer(message.offer);
            break;
        case 'answer':
            handleAnswer(message.answer);
            break;
        case 'new-ice-candidate':
            handleNewICECandidate(message.candidate);
            break;
        default:
            console.error('Tipo de mensagem desconhecido:', message.type);
    }
}
