<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>البث المباشر</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>

body {
    font-family: Arial, sans-serif;
    background-color: #202124;
    color: #fff;
    margin: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100vh;
    align-items: center;
    position: relative;
}

.video-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
}

.user-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}

.user-icon {
    background-color: #3c4043;
    color: #fff;
    border-radius: 50%;
    width: 80px;
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 36px;
}

.user-name {
    margin-top: 10px;
    font-size: 16px;
}

.meeting-info {
    font-size: 14px;
    color: #9aa0a6;
    margin-bottom: 20px;
}

.controls {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #333;
    padding: 10px;
    border-radius: 8px;
    width: 90%;
    max-width: 800px;
}


.buttons {
    display: flex;
    gap: 10px;
}

button {
    background-color: #444;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #555;
}

button.end-call {
    background-color: #e53935;
}

button.end-call:hover {
    background-color: #d32f2f;
}

button i {
    color: #fff;
    font-size: 18px;
}

.chat-icon, .participants-icon {
    position: fixed;
    bottom: 20px;
    background-color: #444;
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: background-color 0.3s;
}

.chat-icon {
    right: 20px;
}

.participants-icon {
    left: 20px;
}

.chat-icon:hover, .participants-icon:hover {
    background-color: #555;
}

.chat-sidebar, .participants-sidebar {
    position: fixed;
    right: 0;
    top: 0;
    width: 300px;
    height: 100%;
    background-color: #333;
    transform: translateX(100%);
    transition: transform 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
}

.participants-sidebar {
    right: auto;
    left: 0;
    transform: translateX(-100%);
}

.chat-sidebar.open {
    transform: translateX(0);
}

.participants-sidebar.open {
    transform: translateX(0);
}

.chat-header, .participants-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #444;
}

.chat-messages, .participants-list {
    flex-grow: 1;
    padding: 10px;
    overflow-y: auto;
}

.chat-input {
    display: flex;
    padding: 10px;
    background-color: #444;
}

.chat-input input {
    flex-grow: 1;
    border: none;
    border-radius: 5px;
    padding: 10px;
    margin-right: 10px;
}

.chat-input button {
    background-color: #555;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.chat-input button:hover {
    background-color: #666;
}

.participant {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #444;
}

.participant span {
    font-size: 16px;
}


#participant-count {
    margin-left: 5px;
    font-size: 12px;
    background-color: #e53935;
    border-radius: 50%;
    padding: 3px 7px;
}
</style>
</head>
<body>
      <div class="video-container">
        <video id="localVideo" autoplay playsinline></video>
        <div id="remoteVideos"></div>
    </div>
    <div class="controls">
        <div class="buttons">
            <button id="muteButton"><i id="muteIcon" class="fas fa-microphone"></i></button>
            <button id="stopCameraButton"><i id="cameraIcon" class="fas fa-video"></i></button>
            <button id="raiseHandButton"><i class="fas fa-hand-paper"></i></button>
            <a href="{{ route('exitBroadcast') }}">
                <button id="exitBroadcastButton" class="end-call"><i class="fas fa-phone"></i></button>
            </a>
        </div>
    </div>
    {{-- <button class="chat-icon" id="chat-icon"><i class="fas fa-comment-alt"></i></button> --}}
    <button class="participants-icon" id="participants-icon">
        <i class="fas fa-users"></i>
        <span id="numberOfStudents"></span>
    </button>
    {{-- <div class="chat-sidebar" id="chat-sidebar">
        <div class="chat-header">
            <span>المحادثة</span>
            <button id="close-chat"><i class="fas fa-times"></i></button>
        </div>
        <div class="chat-messages" id="chat-messages"></div>
        <div class="chat-input">
            <input type="text" id="chat-input" placeholder="Type a message...">
            <button id="send-message"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div> --}}
    <div class="participants-sidebar" id="participants-sidebar">
        <div class="participants-header">
            <span>المشاركين</span>
            <button id="close-participants"><i class="fas fa-times"></i></button>
        </div>
        <div class="participants-list">
            <div class="participant">
                <span id="studentList">  </span>

            </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/7.4.0/adapter.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

    <script>
        let localStream;
        let screenStream;
        let isMuted = false;
        let isCameraStopped = false;
        let peerConnection;

       const pusher = new Pusher('74e6ceca206e76c1d2c6', {
            cluster: 'eu',
            encrypted: true
        });
        const channell = pusher.subscribe('live-stream');
        const channel = pusher.subscribe('chat');


        navigator.mediaDevices.getUserMedia({ video: true, audio: true })
            .then(stream => {
                localStream = stream;
                const remoteVideo = document.getElementById('localVideo');
                remoteVideo.srcObject = stream;
            })
            .catch(error => {
                console.error('Error accessing media devices.', error);
            });


            document.getElementById('muteButton').addEventListener('click', toggleMute);
        document.getElementById('stopCameraButton').addEventListener('click', toggleCamera);
        document.getElementById('raiseHandButton').addEventListener('click', toggleRaiseHand);

        // document.getElementById('chat-icon').addEventListener('click', () => {
        //     document.getElementById('chat-sidebar').classList.add('open');
        // });

        // document.getElementById('close-chat').addEventListener('click', () => {
        //     document.getElementById('chat-sidebar').classList.remove('open');
        // });

        document.getElementById('participants-icon').addEventListener('click', () => {
            document.getElementById('participants-sidebar').classList.add('open');
            updateStudentList();
        });

        document.getElementById('close-participants').addEventListener('click', () => {
            document.getElementById('participants-sidebar').classList.remove('open');
        });



    //خاص للصوت
function toggleMute() {
    if (localStream) {
        localStream.getAudioTracks().forEach(track => {
            track.enabled = !track.enabled;
        });
        isMuted = !isMuted;
        updateMuteIcon();
    }
}

function updateMuteIcon() {
    const muteIcon = document.getElementById('muteIcon');
    if (isMuted) {
        muteIcon.classList.remove('fa-microphone');
        muteIcon.classList.add('fa-microphone-slash');
    } else {
        muteIcon.classList.remove('fa-microphone-slash');
        muteIcon.classList.add('fa-microphone');
    }
}
//خاص للكاميرا
function toggleCamera() {
    if (localStream) {
        const videoTracks = localStream.getVideoTracks();
        if (videoTracks.length > 0) {
            isCameraStopped = !isCameraStopped;
            videoTracks[0].enabled = !isCameraStopped;
            updateCameraIcon();
        }
    }
}

function updateCameraIcon() {
    const cameraIcon = document.getElementById('cameraIcon');
    if (isCameraStopped) {
        cameraIcon.classList.remove('fa-video');
        cameraIcon.classList.add('fa-video-slash');
    } else {
        cameraIcon.classList.remove('fa-video-slash');
        cameraIcon.classList.add('fa-video');
    }
}

    function toggleStudentList() {
        const studentListContainer = document.getElementById('studentListContainer');
        studentListContainer.style.display = studentListContainer.style.display === 'none' ? 'block' : 'none';
    }

    function updateStudentList() {
        fetch('{{ route('currentStudents') }}')
            .then(response => response.json())
            .then(students => {
                const studentList = document.getElementById('studentList');
                studentList.innerHTML = '';
            students.forEach(student => {
                const listItem = document.createElement('li');
                listItem.textContent = `${student.first_name} ${student.last_name}`;
                if (student.hand_raised) {
                    listItem.style.color = 'green';
                    listItem.textContent += ' ✋';
                }
                    studentList.appendChild(listItem);
                });

                //  عدد الطلاب
                const numberOfStudents = students.length;
                const numberOfStudentsElement = document.getElementById('numberOfStudents');
                numberOfStudentsElement.textContent = `(${numberOfStudents})`;
            });
    }


    setInterval(updateStudentList, 5000); // تحديث قائمة الطلاب كل 5 ثواني

    function toggleRaiseHand() {
    const raiseHandButton = document.getElementById('raiseHandButton');
    const handRaised = raiseHandButton.classList.toggle('raised');

    fetch('{{ route('raiseHand') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ hand_raised: handRaised })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            console.log('Hand raise status updated');
        } else {
            console.error('Error updating hand raise status');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function setupWebRTC(stream = null) {
    peerConnection = new RTCPeerConnection();

    peerConnection.onicecandidate = event => {
        if (event.candidate) {
            sendToServer({ type: 'candidate', candidate: event.candidate });
        }
    };

    peerConnection.ontrack = event => {
        const remoteVideo = document.getElementById('localVideo');
        remoteVideo.srcObject = event.streams[0];
    };

    if (stream) {
        stream.getTracks().forEach(track => {
            peerConnection.addTrack(track, stream);
        });

        peerConnection.createOffer()
            .then(offer => peerConnection.setLocalDescription(offer))
            .then(() => {
                sendToServer({ type: 'offer', offer: peerConnection.localDescription });
            })
            .catch(error => {
                console.error('Error creating offer:', error);
            });
    }
}


function sendToServer(message) {
    channel.trigger('client-message', message);
}

function handleOffer(offer) {
    peerConnection.setRemoteDescription(new RTCSessionDescription(offer))
        .then(() => peerConnection.createAnswer())
        .then(answer => peerConnection.setLocalDescription(answer))
        .then(() => {
            sendToServer({ type: 'answer', answer: peerConnection.localDescription });
        })
        .catch(error => {
            console.error('Error handling offer:', error);
        });
}

function handleCandidate(candidate) {
    peerConnection.addIceCandidate(new RTCIceCandidate(candidate))
        .catch(error => {
            console.error('Error handling candidate:', error);
        });
}

    </script>
</body>
</html>
