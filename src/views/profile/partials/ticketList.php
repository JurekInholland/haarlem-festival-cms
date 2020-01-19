<table class="table">
    <thead>
        <tr>
            <th>Ticket id</th>
            <th>Event</th>
            <th>Event Date</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tickets as $idx => $ticket) : ?>
            <tr>
                <td><a href="/admin/ticket/<?= $ticket->getId(); ?>"><?= $ticket->getId(); ?></a></td>
                <td><?= $ticket->getEventName(); ?></td>
                <td><?= $ticket->getEventDate(); ?></td>
                <td>€<?= $ticket->getPrice(); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>