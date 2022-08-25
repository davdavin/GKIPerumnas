<?php
defined('BASEPATH') or exit('No direct script access allowed');

//use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
//use Dompdf\Exception;
require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf
{
    function createPDF($html, $filename = '', $download = FALSE, $paper = 'A4', $orientation = 'potrait')
    {
        $dompdf = new dompdf();
        $dompdf->loadhtml($html);
        $options = $dompdf->getOptions();
        $options->setIsRemoteEnabled(true);
        $dompdf->setOptions($options);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if ($download)
            $dompdf->stream($filename . '.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
}
