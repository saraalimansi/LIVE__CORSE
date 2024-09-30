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

        .remove-participant {
            background-color: #e53935;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        #numberOfStudents {
    color: rgb(69, 31, 31); /* لون الرقم الذي يظهر عدد المشاركين */
}
        .remove-participant:hover {
            background-color: #d32f2f;
        }

        #participant-count {
            margin-left: 5px;
            font-size: 12px;
            background-color: #e53935;
            border-radius: 50%;
            padding: 3px 7px;
        }



        .message {
            padding: 10px;
            border-bottom: 1px solid #ccc;
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
            <button id="startBroadcastButton"><i class="fa fa-broadcast-tower"></i></button>
            <button id="muteButton"><i id="muteIcon" class="fas fa-microphone"></i></button>
            <button id="stopCameraButton"><i id="cameraIcon" class="fas fa-video"></i></button>
            <button id="shareScreenButton"><i class="fas fa-desktop"></i></button>
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
        <div  id="chat-messages" class="chat-messages"></div>
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
        const channel = pusher.subscribe('live-stream');


        navigator.mediaDevices.getUserMedia({ video: true, audio: true })
            .then(stream => {
                localStream = stream;
                const localVideo = document.getElementById('localVideo');
                localVideo.srcObject = stream;
            })
            .catch(error => {
                console.error('Error accessing media devices.', error);
            });

            document.getElementById('startBroadcastButton').addEventListener('click', startBroadcast);
        document.getElementById('muteButton').addEventListener('click', toggleMute);
        document.getElementById('stopCameraButton').addEventListener('click', toggleCamera);
        document.getElementById('shareScreenButton').addEventListener('click', shareScreen);

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

        async function startBroadcast() {
    try {
        const response = await fetch('{{ route('startBroadcast') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        });
        const data = await response.json();
        if (data.status === 'success') {
            console.log('Broadcast started successfully');
            setupWebRTC(localStream);
        } else {
            console.error('Error starting the broadcast:', data.message);
        }
    } catch (error) {
        console.error('Error starting the broadcast:', error);
    }
}


        function shareScreen() {
            navigator.mediaDevices.getDisplayMedia({ video: true })
                .then(stream => {
                    const screenShareData = {
                        type: 'screen',
                        data: stream
                    };
                    fetch('{{ route('shareScreen') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ screenShareData })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            console.log('Screen sharing started successfully');
                            stream.getTracks().forEach(track => {
                                peerConnection.addTrack(track, stream);
                            });
                        } else {
                            console.error('Error starting screen sharing');
                        }
                    })
                    .catch(error => {
                        console.error('Error starting screen sharing:', error);
                    });
                })
                .catch(error => {
                    console.error('Error sharing screen:', error);
                });
        }




        function setupWebRTC(stream) {
            const configuration = {
                iceServers: [
                    { urls: 'stun:stun.l.google.com:19302' },
                    { urls: 'turn:turn.example.com', username: 'user', credential: 'pass' }
                ]
            };
            peerConnection = new RTCPeerConnection(configuration);
            stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));

            peerConnection.onicecandidate = (event) => {
                if (event.candidate) {
                }
            };

            peerConnection.ontrack = (event) => {
                const remoteVideo = document.getElementById('remoteVideo');
                if (remoteVideo) {
                    remoteVideo.srcObject = event.streams[0];
                }
            };

            peerConnection.createOffer()
                .then(offer => peerConnection.setLocalDescription(offer))
                .then(() => {
                })
                .catch(error => {
                    console.error('Error creating offer:', error);
                });
        }




        function updateStudentList() {
    fetch('{{ route('currentStudents') }}')
        .then(response => response.json())
        .then(students => {
            const studentList = document.getElementById('studentList');
            const participantCount = document.getElementById('numberOfStudents');

            studentList.innerHTML = '';
            students.forEach(student => {
                const listItem = document.createElement('li');
                listItem.textContent = `${student.first_name} ${student.last_name}`;
                if (student.hand_raised) {
                    listItem.style.color = 'green';
                    listItem.textContent += ' ✋';
                }

                const removeButton = document.createElement('button');
                removeButton.className = 'remove-participant';
                removeButton.innerHTML = '<i class="fas fa-user-minus"></i>';

                removeButton.onclick = () => removeStudent(student.id);

                listItem.appendChild(removeButton);
                studentList.appendChild(listItem);
            });

            // تحديث عدد المشاركين
            participantCount.textContent = `(${students.length})`;
        });
}


        function removeStudent(studentId) {
            fetch('{{ route('removeStudent', ['studentId' => '__ID__']) }}'.replace('__ID__', studentId), {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    console.log('Student removed successfully');
                    updateStudentList();
                } else {
                    console.error('Error removing student');
                }
            })
            .catch(error => {
                console.error('Error removing student:', error);
            });
        }


        // تحديث قائمة الطلاب
        setInterval(updateStudentList, 3000); //  كل 3 ث

    </script>
</body>
</html>

