
const canvas = document.getElementById('canvas');
const canva = canvas.getContext('2d');
const video = document.getElementById('video');

const MDC = {
    audio: false,
    video: {
        width: {min: 1024, default: 1280, max: 1920},
        height: {min:  576, default: 720, max: 1080}
    }
};

async function webcam() { 
    try {
        canvas.classList.add('cam');
        const stream = await navigator.mediaDevices.getUserMedia(MDC);
        video.srcObject = stream;
        window.stream = stream;
    } catch (error) {
        console.log(`Error at ${error}.`);
        const web_err = document.getElementById('webcam-error');
    }
} webcam();

document.getElementById('snap').addEventListener('click', async function(e) {
    e.preventDefault();

    canva.drawImage(video, 0, 0, 300, 160);
    canvas.classList.add('canvas-active');
    const userImage = canvas.toDataURL("image/jpeg", 0.5);
    try {
        const response = await fetch('../database/db.php', {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/json',
                'Access-Control-Allow-Origin' : '*',
                'Access-Control-Allow-Credentials' : true 
            },
            body: JSON.stringify({
                userImage : userImage   
            })
        });
        const content = await response.json();
        
        if (response.ok) {
            console.log('success!');
        } else {
            console.log('failed. :C');
        }
        
    } catch (error) {
        console.log(`Error at ${error}`);
    }
});
