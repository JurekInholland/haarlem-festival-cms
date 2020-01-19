<?php

class TicketController extends Controller {
    
    
    public function index() {

    }

    public function show($ticketId) {
        if ($ticketId) {
            $ticket = TicketService::getTicketById($ticketId);
            if ($ticket) {

                if (isset($_GET["pdf"])) {
                    $pdf = PdfService::genTickets($ticket);
                    ob_end_clean();
                    return $pdf->Output("ticket_{$ticketId}.pdf", 'I');
                }

                return self::view("partials/ticket", ["ticket" => $ticket[0]]);
            }
            // TODO: admin message view instead echo
            echo "{$ticketId} was not found.";
        }
        echo "No ticket id given.";
    }


}