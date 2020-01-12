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
        <style>
            img {
                width: 175px;
            }
        </style>
        <img src="{$qr}" alt="">
        <br>
        <span>  Ticket Id: dsf8sd97fd</span>
        EOD;

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '130', '10', $qrHtml);
        
        $html = <<<EOD
        <h1>Haarlem Festival Ticket</h1>
        <h3>Event: Gare du Nord</h3>
        <p>Restaurant ML</p>
        <p>Kleine Houtstraat 70, 2011 DR Haarlem, Nederland</p>
        EOD;
        $pdf->writeHTMLCell(0, 0, '10', '10', $html);

        // The '@' character is used to indicate that follows an image data stream and not an image file name

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        
        return $pdf;

    }
}