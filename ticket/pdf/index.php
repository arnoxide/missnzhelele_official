<?php

require_once 'autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

// $html = '<h1 > hello</h1>';
$html = file_get_contents('../index.php');
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

$dompdf->stream("new file", array('Attachment'=>0));

$pdf = $dompdf->output();
file_put_contents("mk.pdf",$pdf);