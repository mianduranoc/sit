<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;;
ob_start();
require_once "../formatos/ReporteSem.php";
$html=ob_get_clean();
$dom = new Dompdf();
$dom->loadHtml($html);
$dom->setPaper('letter', 'landscape');
$dom->render();
$dom->stream("reporte.pdf", array("Attachment" => 0));