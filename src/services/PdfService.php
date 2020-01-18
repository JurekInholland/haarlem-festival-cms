<?php

class PdfService {


    public function generateTicket(Ticket $ticket) {

    } 


    private function createTicketHtml(Ticket $ticket) {

    }

    public static function genTickets(array $tickets) {
        $pdf = self::setupPdf();

        foreach ($tickets as $key => $ticket) {

            // 3 tickets fit on a single A4 page. Every third iteration, add a new page
            if ($key % 3 == 0) {
                $pdf->AddPage();
            }

            // Store Y position before writing ticket text block
            $y = $pdf->GetY();
            $ticketHtml = self::generateTicketHtml($ticket);
            $pdf->writeHTMLCell(0, 0, '', '', $ticketHtml, 0, 1, false, false, 'L', true);
            
            // Reset Y position to align QR code vertically
            $pdf->SetY($y);
            $qrHtml = self::generateQrHtml($ticket);
            $pdf->writeHTMLCell(0, 0, '130', '', $qrHtml, 0, 1, false, false, 'L', true);

        }
        return $pdf;
    }

    private static function generateQrHtml(Ticket $ticket) {
        $qr = $ticket->getQrcode();
        $currentUser = App::get("user")->getName();

        $html = <<<EOD
        <h5> </h5>
        <img style="width: 180px;" src="{$qr}" alt="">
        <span>  Ticket Id: {$ticket->getId()}</span><br>
        <span>  Requested by: {$currentUser}</span><br>
        EOD;
     
        return $html;
    }


    private static function generateTicketHtml(Ticket $ticket) {
        $html = <<<EOD
        <br>
        <h1>Haarlem Festival Ticket</h1>
        <h3>Event: {$ticket->getEventName()}</h3>
        <h5>{$ticket->getEventAddress()}, {$ticket->getEventLocation()}</h5>
        <h2>{$ticket->getEventDate()}</h2>
        <h4>General Admission</h4>
        <span>Ordered by: {$ticket->getUsername()} <br>
        Bought on: {$ticket->getOrderDateReadable()}
        </span><h4> </h4>
        <div style="border-bottom: 1px dashed black;"></div>
        EOD;
        return $html;
    }

    private static function setupPdf() {
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                

        // Disable header and footer border
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        return $pdf;

    }

    public static function createInvoice(Invoice $invoice) {
        $pdf = self::setupPdf();
        $pdf->AddPage();

        $tickets = $invoice->getTickets();

        $tableHtml = self::invoiceTableHtml($tickets);
        $letterHead = self::invoiceLetterhead($invoice);


        $pdf->writeHTMLCell(0, 0, '', '', $letterHead, 0, 1, 0, true, 'L', true);

        $table = <<<EOD
        <table cellspacing="0" cellpadding="3" border="1">
            <tr>
                <th align="left" width="310"><h5>Item</h5></th>
                <th align="right" width="70"><h5>Cost</h5></th>
                <th align="right" width="70"><h5>Quantity</h5></th>
                <th align="right" width="80"><h5>Total</h5></th>
            </tr>
            {$tableHtml}
        </table>
        EOD;
        $pdf->writeHTMLCell(0, 0, '10', '', $table, 0, 1, 0, true, 'L', true);


        $total = self::invoiceTotalHtml($invoice);
        $pdf->writeHTMLCell(0, 0, '155', '', $total, 0, 1, 0, true, 'R', true);


        return $pdf;

        // die(var_dump($tableHtml));


    }

    private static function invoiceTotalHtml(Invoice $invoice) {
        return <<<EOD
        <br>
        <br>
        <table style="line-height: 22px; font-size: 14px;" width="125" align="right">
          <tr>
            <td align="right">Subtotal</td>
            <td align="right">€{$invoice->getTotalPrice()}</td>
          </tr>
          <tr>
            <td align="right">VAT</td>
            <td align="right">€{$invoice->getTotalVat()}</td>
          </tr>
          <tr>
            <td style="border-top: 1px solid black; font-weight: bold;" align="right">Total</td>
            <td style="border-top: 1px solid black; font-weight: bold;" align="right">€{$invoice->getTotal()}</td>
          </tr>
        </table>
        EOD;
    }

    private static function invoiceLetterhead(Invoice $invoice) {
        return <<<EOD
        <h1>Haarlem Festival Invoice</h1>
        <span>Invoice date: {$invoice->getInvoiceDate()}<br>
        Payment due date: {$invoice->getDueDate()}</span><br>
        <br>
        <table width="530">
          <tr>
            <td align="left">{$invoice->getCustomerName()}</td>
            <td align="right">Haarlem Festival</td>
          </tr>
          <tr>
            <td align="left">{$invoice->getCustomer()->getAddress()}</td>
            <td align="right">Bijdorplaan 15, 2015 CE</td>
          </tr>
          <tr>
            <td align="left">{$invoice->getCustomer()->getPhone()} </td>
            <td align="right">+31 23 541 2412</td>
          </tr>
          <tr>
            <td align="left">{$invoice->getCustomer()->getEmail()}</td>
            <td align="right">contact@haarlem-festival.nl</td>
          </tr>
        </table>
        <br>
        EOD;
    }

    private static function invoiceTableHtml(array $tickets) {
        $tableRow = "";
        foreach ($tickets as $key => $ticket) {

            if ($key % 2 == 0) {
                $color = "#ffffff";
            } else {
                $color = "#f3f3f3";
            }
            $tableRow .= <<<EOD
            <tr style="background-color:{$color};">
                <td align="left">{$ticket->getEventName()}</td>
                <td align="right">€ {$ticket->getPrice()}</td>
                <td align="right">{$ticket->getAmount()}</td>
                <td align="right">€ {$ticket->getTotalPrice()}</td>
            </tr>
            EOD;
        }
        return $tableRow;
    }


}