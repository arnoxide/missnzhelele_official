<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MissNzhelele Guest Scanner</title>
  <script src="qrcode.min.js"></script>
  <!-- <script src="codemirror/lib/codemirror.js"></script>
  <link rel="stylesheet" href="codemirror/lib/codemirror.css" rel="stylesheet">
  <script src="codemirror/mode/xml/xml.js"></script>
  <script src="codemirror/mode/php/php.js"></script>
  <link rel="stylesheet" href="codemirror/theme/dracula.css" rel="stylesheet">
  <script src="codemirror/addon/edit/closetag.js"></script> -->
</head>
<body>

<style>
  /* .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  } */
</style>


<div class="row">
  <div class="col">
    <div style="width:500px;" id="reader"></div>
  </div>
  <div class="col" style="padding:30px;">
    <h4>SCAN RESULT</h4>
    <div id="result">
      
    <textarea id="editor"></textarea>
    </div>
 
  </div>
</div>


<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
    document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage;
}

function onScanError(errorMessage) {
  //handle scan error
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>
<script>
var editor = CodeMirror.fromTextArea(document.getElementById('editor'),{
  mode: "xml",
  theme:"dracula",
  lineNumbers:true,
  autoCloseTags: true
});
editor.setSize("80", "80");
  </script>
</body>
</html>