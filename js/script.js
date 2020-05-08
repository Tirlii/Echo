alert('Ce projet est en phase de test, les photos téléchargées seront mise en ligne sur le serveur mais ne seront pas exploitées et seront supprimées si besoin. Si vous rencontrez un problème envoyez moi un mail a l\'adresse : thibaut[at]chayot.fr')
var prenom = prompt('Quel est votre prénom ?')
$('#name').val(prenom);

// Get handles on the video and canvas elements
var video = document.getElementById('video');
var canvas = document.querySelector('canvas');
// Get a handle on the 2d context of the canvas element
var context = canvas.getContext('2d');
// Define some vars required later
var w, h, ratio;
/*function startVideo() {
navigator.mediaDevices.getUserMedia(
{ video: {} }, 
stream => video.srcObject = stream,
err => console.error(err)
)
}*/

function startVideo() {
    window.addEventListener('load', async function init(e) {
        try {
          const stream = await navigator.mediaDevices.getUserMedia({
            video: true
          })
          const videoTracks = stream.getVideoTracks()
          const track = videoTracks[0]
          alert(`Getting video from: ${track.label}`)
          document.querySelector('video').srcObject = stream 
        } catch (error) {
          alert(`${error.name}`)
          console.error(error)
        }
      })
}
Promise.all([
faceapi.nets.tinyFaceDetector.loadFromUri('models'),
faceapi.nets.faceLandmark68Net.loadFromUri('models'),
faceapi.nets.faceRecognitionNet.loadFromUri('models'),
faceapi.nets.faceExpressionNet.loadFromUri('models')
]).then(startVideo())	


// Add a listener to wait for the 'loadedmetadata' state so the video's dimensions can be read
video.addEventListener('play', function() {
    // Calculate the ratio of the video's width to height
    ratio = video.videoWidth / video.videoHeight;
    // Define the required width as 100 pixels smaller than the actual video's width
    w = video.videoWidth - 100;
    // Calculate the height based on the video's width and the ratio
    h = parseInt(w / ratio, 10);
    // Set the canvas width and height to the values just calculated
    canvas.width = w;
    canvas.height = h;	

    
    const displaySize = { width: video.clientWidth, height: video.clientHeight }
    animate()
    async function animate(){
        const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions()
        const resizedDetections = faceapi.resizeResults(detections, displaySize)
        canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
        /* ---------------- ICI TU PEUX RECUPERER LES INFOS SUR LES VISAGES DETECTES ----------- */
        resizedDetections.forEach(result=>{
        //console.log(result) //<------- *
        if(result.expressions.surprised > 0.99) {
                snap()
        }
        //console.log(result.expressions.happy) //<------- *
        })
    /* ---------------- ICI TU PEUX RECUPERER LES INFOS SUR LES VISAGES DETECTES ----------- */
        requestAnimationFrame(animate)
}		
});
// Takes a snapshot of the video

function snap() {
    // Define the size of the rectangle that will be filled (basically the entire element)
    context.fillRect(0, 0, w, h);
    // Grab the image from the video
    context.drawImage(video, 0, 0, w, h);
    uploadEx();
    
}



function uploadEx() {
        var canvas = document.querySelector('canvas');
        var dataURL = canvas.toDataURL("image/png");
        document.getElementById('hidden_data').value = dataURL;
        var fd = new FormData(document.forms["form1"]);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'upload_data.php', true);

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                var percentComplete = (e.loaded / e.total) * 100;
                console.log(percentComplete + '% uploaded');
                alert('Succesfully uploaded');
            }
        };

        xhr.onload = function() {

        };
        xhr.send(fd);
    };