<?php

class PdfService {


    public function generateTicket(Ticket $ticket) {

    } 


    private function createTicketHtml(Ticket $ticket) {

    }



    public static function createPdf($htmlContent) {
        require_once("../src/modules/tcpdf/tcpdf.php");

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Disable header and footer border
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        $pdf->AddPage();

        $qr = generateQrcode("https://google.com");
        // Set some content to print
        $qrHtml = <<<EOD
        <img style="width: 175px;" src="{$qr}" alt="">
        <br>
        <span>  Ticket Id: dsf8sd97fdf7d9s3</span><br>
        <span>  Requested by: Admin</span><br>
        EOD;

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '140', '10', $qrHtml);
        
        $html = <<<EOD
        <h1>Haarlem Festival Ticket</h1>
        <h3>Event: Gare du Nord</h3>
        <h5>Restaurant ML<br>Kleine Houtstraat 70, 2011 DR Haarlem, Nederland</h5>
        <h2>Tuseday, 26.06.2020 22:00</h2>
        <h4>General Admission</h4>
        <span>Ordered by: Jurek <br>
        bought on: 17.05.2020 <br>
        <div style="border-bottom: 1px dashed black;"></div>
        EOD;


        $pdf->writeHTMLCell(0, 0, '10', '10', $html);

        // $pdf->writeHTMLCell(0, 0, '10', '100', $html);

        // $pdf->writeHTMLCell(0, 0, '10', '200', $html);
        // $pdf->writeHTMLCell(0, 0, '10', '300', $html);
        // $pdf->writeHTMLCell(0, 0, '10', '400', $html);
        // The '@' character is used to indicate that follows an image data stream and not an image file name

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        
        return $pdf;

    }
}