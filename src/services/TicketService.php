<?php

class TicketService {

    public function setPaid(string $ticketId) {
        $sql = "UPDATE tickets SET IS_PAID=1
        WHERE ticket_id = :ticket_id";

        $params = [":ticket_id" => $ticketId];
        App::get("db")->query($sql, $params);
    }


    public function setScanned(string $ticketId) {
        $sql = "UPDATE tickets SET TICKET_SCANNED=1
        WHERE ticket_id = :ticket_id";

        $params = [":ticket_id" => $ticketId];
        App::get("db")->query($sql, $params);
    }


    // Create ticket and store in db
    public function createTicket(int $userId, int $eventId, int $amount) {
        $sql = "INSERT INTO tickets (ticket_id, user_id, event_id, amount, IS_PAID, TICKET_SCANNED, order_date)
        VALUES (:ticket_id, :user_id, :event_id, :amount, :paid, :scanned, :order_date)";
        $params = [
            ":ticket_id" => generateUuid(18),
            ":user_id" => $userId,
            ":event_id" => $eventId,
            ":amount" => $amount,
            ":paid" => 0,
            ":scanned" => 0,
            ":order_date" => date('Y-m-d H:i:s')
        ];

        App::get("db")->query($sql, $params);
    }


    private static function parseTickets(array $ticketdata) {
        $tickets = [];
        foreach ($ticketdata as $ticket) {

            $event = new FestivalEvent($ticket);
            $ticket["event"] = $event;

            $model = new Ticket($ticket);
            array_push($tickets, $model);
        }

        return $tickets;
    }

    public static  function getUserTickets(string $username) {
        $sql = "SELECT tickets.*, festival_events.*, cms_users.username FROM tickets JOIN festival_events ON tickets.event_id = festival_events.id
                JOIN cms_users ON tickets.user_id = cms_users.id
                WHERE username LIKE :username";
        $params = [":username" => $username];

        $ticketdata = App::get("db")->query($sql, $params);
        return self::parseTickets($ticketdata);

    }

    public static function getTicketById(string $ticketId) {
        $sql = "SELECT tickets.*, festival_events.*, cms_users.username FROM tickets JOIN festival_events ON tickets.event_id = festival_events.id
                JOIN cms_users ON tickets.user_id = cms_users.id
                WHERE tickets.ticket_id = :ticket_id";
        $params = [":ticket_id" => $ticketId];

        $ticketdata = App::get("db")->query($sql, $params);
        return self::parseTickets($ticketdata);
    }

    public function getAll() {
        $sql = "SELECT tickets.*, festival_events.*, cms_users.username FROM tickets
                JOIN festival_events ON tickets.event_id = festival_events.id
                JOIN cms_users ON tickets.user_id = cms_users.id";
        
        $ticketdata = App::get("db")->query($sql);
        return self::parseTickets($ticketdata);
    }
}