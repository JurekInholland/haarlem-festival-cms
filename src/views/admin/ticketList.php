<style>
.pdf-info {
    margin-top: 1rem;
}
</style>

<table class="table">
    <thead>
        <tr>
            <th>Ticket id</th>
            <th>Event</th>
            <th>Ticket Owner</th>
            <th>Event Date</th>
            <th>Price</th>
            <th>Paid</th>
            <th>Scanned</th>
            <th>Payment Status</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($tickets as $idx => $ticket) :
        ?>

        <tr>
            <td><a href="/admin/ticket/<?= $ticket->getId(); ?>"><?= $ticket->getId(); ?></a></td>
            <!-- <td><?= $ticket->getId(); ?></td> -->
            <td><?= $ticket->getEventName(); ?></td>
            <td><?= $ticket->getUsername(); ?></td>
            <td><?= $ticket->getEventDate(); ?></td>
            <td>€<?= $ticket->getPrice(); ?></td>
            <td><?= $ticket->isPaidReadable(); ?></td>
            <td><?= $ticket->isScannedReadable(); ?></td>
            <td>
                <form action="/admin/tickets" method="POST">
                    <input type="submit" value="Set Paid" name="<?= $ticket->getId(); ?>"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<a href="/admin/createTicket" class="btn btn-primary">New Ticket</a>

<p class="pdf-info">Tickets that are paid are available as <a href="/admin/tickets/pdf">PDF</a>.</p>
<?php

require "../src/views/admin/partials/exportTickets.php";

?>