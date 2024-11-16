
<script src="ht.js"></script>
<style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background-color: #f2f2f2;
    }

    .result {
      background-color: green;
      color: #fff;
      padding: 20px;
    }

    .row {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .col {
      text-align: center;
    }

    #reader {
      width: 500px;
      height: 500px;
      border: 2px solid gold;
      border-radius: 25px;

   
    }
    /* @media (max-width: 768px) {
      #reader {
        width: 100%;
        background: gold;
      }
    } */


    form {
      margin-top: 10px;
    }

    input.input {
      width: 80%;
      padding: 10px;
      box-sizing: border-box;
    }

    h4 {
      margin-bottom: 10px;
    }

    /* @media (max-width: 768px) {
      .col {
        width: 100%;
      }
    } */
  </style>
<div class="row">
    <div class="col">
      <div id="reader"></div>
    </div>
  </div>
  <script src="ht.js"></script>
  <audio id="myAudio1">
    <source src="success.mp3" type="audio/ogg">
  </audio>
  <audio id="myAudio2">
    <source src="failes.mp3" type="audio/ogg">
  </audio>

  <div class="col" style="padding:30px;">
    <h4>SCAN RESULT</h4>
    <div>Guest name</div><form action="">
     <input type="text" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" /></form>
     <p>Status: <span id="txtHint"></span></p>
  </div>
</div>
<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
    document.getElementById("result").value = qrCodeMessage;
    showHint(qrCodeMessage);
playAudio();

}
function onScanError(errorMessage) {
  //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>
<script>
var x = document.getElementById("myAudio1");
var x2 = document.getElementById("myAudio2");      
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }
} 

function playAudio() { 
  x.play(); 
} 


  </script>