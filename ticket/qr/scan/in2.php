<script>
  var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
  if (xhr.readyState === 4) {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
    } else {
      console.error("Request failed: " + xhr.status);
    }
  }
};

xhr.open("GET", "http://localhost/echo/echo-tech/echo-code/core/qr/scan.php#scan-using-file");
xhr.send();

</script>