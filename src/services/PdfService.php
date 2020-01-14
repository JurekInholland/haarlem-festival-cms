<?php

class PdfService {


    public function generateTicket(Ticket $ticket) {

    } 


    private function createTicketHtml(Ticket $ticket) {

    }


    private static function setupPdf() {

        require_once("../src/modules/tcpdf/tcpdf.php");
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                
        // Disable header and footer border
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        $pdf->AddPage();
        return $pdf;

    }

    public static function createInvoice(array $tickets) {

        $pdf = self::setupPdf();
        
        $tablehtml = "";
        $subtotal = 0;
        $tax = 0;

        # Iterate over passed tickets
        foreach ($tickets as $key => $ticket) {

            if ($key % 2 == 0) {
                $color = "#efefef";
            } else {
                $color = "#ffffff";
            }

            $subtotal = $subtotal + floatval($ticket["total"]);
            // $tax = $tax + floatval($ticket["tax"]);
            $total = $subtotal + $tax; 


            $tablehtml .= "<tr style=\"background-color:{$color};\">
                             <td align=\"left\">{$ticket["name"]}</td>
                             <td align=\"right\">€ {$ticket["cost"]}</td>
                             <td align=\"right\">{$ticket["quantity"]}</td>
                             <td align=\"right\">{$ticket["total"]}</td>
                           </tr>";
            
        }


        $recipient = <<<EOD
        <h1>Haarlem Festival Invoice</h1>
        <span>Invoice date: 12-02-2020<br>
        Payment due date: 13-03-2020</span><br>
        <br>
        <table width="530">
          <tr>
            <td align="left">Customer name</td>
            <td align="right">Haarlem Festival</td>
          </tr>
          <tr>
            <td align="left">Address</td>
            <td align="right">Bijdorplaan 15, 2015 CE</td>
          </tr>
          <tr>
            <td align="left">phone</td>
            <td align="right">+31 23 541 2412</td>
          </tr>
        </table>
        <br>
        EOD;

        $pdf->writeHTMLCell(0, 0, '', '', $recipient, 0, 1, 0, true, 'L', true);

        $table = <<<EOD
        <table cellspacing="0" cellpadding="3" border="1">
            <tr>
                <th align="left" width="310"><h5>Item</h5></th>
                <th align="right" width="70"><h5>Cost</h5></th>
                <th align="right" width="70"><h5>Quantity</h5></th>
                <th align="right" width="80"><h5>Total</h5></th>
            </tr>
            {$tablehtml}
        </table>
        EOD;
        $pdf->writeHTMLCell(0, 0, '10', '', $table, 0, 1, 0, true, 'L', true);


        $html = <<<EOD
        <br>
        <br>
        <table style="font-size: 14px;" width="125" align="right">
          <tr>
            <td align="left">Subtotal</td>
            <td align="right">€265,00</td>
          </tr>
          <tr>
            <td align="left">VAT</td>
            <td align="right">€25,50</td>
          </tr>
          <tr>
            <td style="font-weight: bold;" align="left">Total</td>
            <td align="right">€290,50</td>
          </tr>
        </table>
        EOD;
        $pdf->writeHTMLCell(0, 0, '155', '', $html, 0, 1, 0, true, 'R', true);


        return $pdf;
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