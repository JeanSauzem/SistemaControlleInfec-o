<?php
require_once("../dompdf/autoload.inc.php");
spl_autoload_register('DOMPDF_autoload');
function pdf_criar($html, $filename, $paper, $orientation, $stream=TRUE){
    $dompdf = new DOMPDF();
    $dompdf->set_paper($paper, $orientation);
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($filename.".pdf");
    
}
 


?>