<?php

class TicketService {

    public function createTicket(int $userId, int $eventId) {

    }

    public function getAll() {
        $sql = "SELECT tickets.* FROM tickets JOIN events ON tickets.event_id = events.id";
        
        $ticketdata = App::get("db")->query($sql);

        $tickets = [];
        foreach ($ticketdata as $ticket) {
            $model = new Ticket($ticket);
            array_push($tickets, $model);
        }

        return $tickets;
    }
}