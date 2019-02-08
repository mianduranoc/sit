<?php
require '../vendor/autoload.php';
ini_set('max_execution_time', 0);
use Dompdf\Dompdf;;
ob_start();
require_once "../formatos/RepSemTutor.php";
$html=ob_get_clean();
$dom = new Dompdf();
$dom->loadHtml($html);
$dom->setPaper('letter', 'landscape');
$dom->render();
$dom->stream("reporteTutor.pdf", array("Attachment" => 0));