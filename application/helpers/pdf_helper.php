<?php

function generate_invoice_pdf($html, $order_id)
{
    require_once APPPATH . 'third_party/dompdf/dompdf/autoload.inc.php';

    $dompdf = new \Dompdf\Dompdf();

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $output = $dompdf->output();

    $file_path = FCPATH . "uploads/invoice_$order_id.pdf";

    file_put_contents($file_path, $output);

    return $file_path;
}

?>