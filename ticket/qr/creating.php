<?php
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qrcode = $path.$fname().".png";

QRcode::png("
love


", $qrcode);
echo "<img src='".$qrcode."'>";
