<style>

.ticket {
    display: flex;
    flex-flow: row;
    flex-wrap: wrap;
    justify-content: space-between;
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 1rem;
}

.ticket h1, h2, h3, h4, h5 {
    font-weight: bold;
    margin: .556em 0;
}

.ticket_info {
    /* margin-right: 2.5rem; */
    margin-left: 10px;
    margin-bottom: 1rem;
}

.ticket_qrcode {
    display: flex;
    flex-direction: column;
    justify-content: center;

}

.ticket_qrcode img {
    width: 250px;
}
.ticket_qrcode span {
    margin-left: .5rem;
    margin-top: -5px;
}

.download {
    flex-basis: 100%;
}


</style>


<section class="ticket">

    <section class="ticket_info">
        <h1>Haarlem Festival Ticket</h1>
        <h4>Event: <?= $ticket->getEventName(); ?></h4>
        <h5><?= $ticket->getEventAddress(); ?>, <?= $ticket->getEventLocation(); ?></h5>
        <h2><?= $ticket->getEventDate(); ?></h2>
        <h4>General Admission</h4>
        <span>Ordered by: <?= $ticket->getUsername(); ?> </br>
        Bought on: <?= $ticket->getOrderDateReadable(); ?></span>
    </section>


    <section class="ticket_qrcode">
        <img src="<?= $ticket->getQrcode(); ?>" alt="">
        <span>Ticket id: <?= $ticket->getId(); ?></span>
    </section>

    <section class="download">
        <hr>
        <p>Download ticket as <a href="/admin/ticket/<?= $ticket->getId(); ?>?pdf">PDF</a>.</p>
    </section>

</section>

