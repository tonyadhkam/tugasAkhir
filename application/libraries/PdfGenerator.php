<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;
class PdfGenerator
{
    public function generate($html,$filename,$paper_size,$orientation)
    {
        define('DOMPDF_ENABLE_AUTOLOAD', false);
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $dompdf = new DOMPDF();
        $dompdf->setOptions($options);
        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
    }
}

/* End of file PdfGenerator.php */

?>