<?php
session_start();

if (!isset($_SESSION["student_name"])) {
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    a {
      text-decoration: none;
      color: black;
    }

    .section {
      background-color: #ffffff;
      border-radius: 0.25em;
      position: absolute;
      display: block;
      width: 90%;
      left: 6%;
      z-index: -10;
    }

    #my-qr-reader {
      padding: 20px !important;
      border: 1.5px solid #b2b2b2 !important;
      border-radius: 8px;
    }

    #my-qr-reader img[alt="Info icon"] {
      display: none;
    }

    #my-qr-reader img[alt="Camera based scan"] {
      width: 100px !important;
      height: 100px !important;
    }

    button {
      padding: 10px 20px;
      border: 1px solid #b2b2b2;
      outline: none;
      border-radius: 0.25em;
      color: white;
      font-size: 15px;
      cursor: pointer;
      margin-top: 15px;
      margin-bottom: 10px;
      background-color: #008000ad;
      transition: 0.3s background-color;
    }

    button:hover {
      background-color: #008000;
    }

    #html5-qrcode-anchor-scan-type-change {
      text-decoration: none !important;
      color: #1d9bf0;
    }

    video {
      width: 300px !important;
      border: 1px solid #b2b2b2 !important;
      border-radius: 0.25em;
      margin: auto;
    }
  </style>
</head>

<body>
  <main>
    <?php $title = 'Attendace System';
    $username = $_SESSION['student_name'];
    include "../componets/header.php" ?>
    <div id="box">
      <a href="../logout.php">Logout</a>
    </div>
    <div class="container">
      <h1>Scan QR Code</h1>
      <div class="section">
        <div id="my-qr-reader">
        </div>
      </div>
    </div>
    <script src="https://unpkg.com/html5-qrcode">
    </script>
    <script src="script.js"></script>
    </div>
  </main>
  <script>
    var show = 0;
    function showBox() {
      box = document.getElementById('box');
      if (show == 0) {
        box.style.height = "100px";
        show = 1;
      } else {
        box.style.height = "0px";
        show = 0;
      }
    }

    function domReady(fn) {
      if (
        document.readyState === "complete" ||
        document.readyState === "interactive"
      ) {
        setTimeout(fn, 1000);
      } else {
        document.addEventListener("DOMContentLoaded", fn);
      }
    }

    domReady(function () {

      // If found you qr code
      function onScanSuccess(decodeText, decodeResult) { 
        console.log(decodeText);

        let qr_info = JSON.parse(decodeText);

        current_date = new Date();
        qr_date = new Date(qr_info.date);

        current_time = current_date.getTime();
        qr_time = qr_date.getTime();

        time_difference = (current_time-qr_time)/(1000*60);

        h=0;
        if(time_difference<5){
          window.location.href = "scan_qr.php?s_id=<?php echo $_SESSION['id'];?>&s_name=<?php echo $_SESSION['student_name'];?>&rollno=<?php echo $_SESSION['rollno'];?>&section=<?php echo $_SESSION['section']; ?>&subject="+qr_info.subject+"&date="+qr_info.date;
        }else{
          window.location.href = "expired.php";
        }
      }

      let htmlscanner = new Html5QrcodeScanner(
        "my-qr-reader",
        { fps: 10, qrbos: 250 }
      );
      htmlscanner.render(onScanSuccess);
    });
  </script>
</body>

</html>