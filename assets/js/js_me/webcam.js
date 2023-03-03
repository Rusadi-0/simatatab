Webcam.set({
    // width: 3840,
    // height: 2160,
    // width: 1280,
    // height: 800,
    // width: 1024,
    // height: 768,
    // width: 824,
    // height: 468,
    width: 420,
    height: 300,
    
    
    image_format: 'jpg',
    jpeg_quality: 900000
  });
  Webcam.attach('#my_camera');
  // Configure a few settings and attach camera
  // A button for taking snaps


  // preload shutter audio clip
  // var shutter = new Audio();
  // shutter.autoplay = false;
  // shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

  function take_snapshot() {
    // play sound effect
    // shutter.play();

    // take snapshot and get image data
    Webcam.snap(function(data_uri) {
      // display results in page
      document.getElementById('results').innerHTML =
        '<img id="imageprev" class="card-img-top" src="' + data_uri + '"/>';
    });
    var base64image = document.getElementById("imageprev").src;

    Webcam.upload(base64image, '/upload.php', function(code, text) {
      // pesan berhasil
      document.getElementById("gambar").value = text;
      document.getElementById("gambar1").value = text;
      document.getElementById("ambil").setAttribute("disabled", true);  
      document.getElementById('reset').disabled = false;
    });
    // var ol = document.getElementById("imageprev");
    // ol.remove();

    // Webcam.reset();

  }

  document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 119) {
        take_snapshot();
        document.getElementById("ambil").setAttribute("disabled", true);  
      document.getElementById('reset').disabled = false;
    };
  };


