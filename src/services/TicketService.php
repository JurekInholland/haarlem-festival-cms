<?php

class TicketService {

    // Create ticket and store in db
    public function createTicket(int $userId, int $eventId) {

    }

    public function getUserTickets(string $username) {
        $sql = "SELECT tickets.*, events.* FROM tickets JOIN events ON tickets.event_id = events.id
                JOIN cms_users ON tickets.user_id = cms_users.id
                WHERE username LIKE :username";
        $params = [":username" => $username];

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