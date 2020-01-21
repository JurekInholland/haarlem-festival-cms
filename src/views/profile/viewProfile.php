<style>
.form {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
}

.form section {
    /* flex-basis: 50%; */
    min-width: 300px;
}


.table .icon {
    background-size: contain;
    display: block;
    width: 30px;
    height: 30px;
}

.pdf-icon {
    background-image: url("/img/pdf.svg");
}

</style>

<?php
if ($user->getId() == App::get("user")->getId()) {
    $username = "My";
} else {
    $username = ucfirst($user->getName()) . "'s";
}

?>

<h1><?=$username?> Profile</h1>
<form action="" class="form">

    <section>
        <label for="">Username</label>
        <input type="text" name="" readonly class="form-control-plaintext" value="<?=$user->getName()?>">
    </section>

    <section>
        <label for="">Email</label>
        <input type="text" name="" readonly class="form-control-plaintext" value="<?=$user->getEmail()?>">
    </section>

    <section>
        <label for="">First name</label>
        <input type="text" name="" readonly class="form-control-plaintext" value="<?=$user->getFirstname()?>">
    </section>

    <section>
        <label for="">Last name</label>
        <input type="text" name="" readonly class="form-control-plaintext" value="<?=$user->getLastname()?>">
    </section>

    <section>
        <label for="">Address</label>
        <input type="text" name="" readonly class="form-control-plaintext" value="<?=$user->getAddress()?>">
    </section>

    <section>
        <label for="">Phone</label>
        <input type="text" name="" readonly class="form-control-plaintext" value="<?=$user->getPhone()?>">
    </section>

</form>


<ul class="nav nav-tabs" id="myTab" role="tablist">
 
  <li class="nav-item">
    <a class="nav-link active" id="tickets-tab" data-toggle="tab" href="#tickets" role="tab" aria-controls="tickets" aria-selected="false"><?=$username?> Tickets</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="invoices-tab" data-toggle="tab" href="#invoices" role="tab" aria-controls="invoices" aria-selected="false"><?=$username?> Invoices</a>
  </li>
</ul>


<div class="tab-content">

  <div class="tab-pane active fade show" id="tickets" role="tabpanel" aria-labelledby="profile-tab">
    <table class="table">
        <thead>
            <tr>
                <th>Ticket id</th>
                <th>Event</th>
                <th>Event Date</th>
                <th>Price (excl. VAT)</th>
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
    </table>
  </div>

  <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="profile-tab">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Number Events</th>
                <th>Date</th>
                <th>PDF</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($invoices as $key => $invoice) : ?>
                <tr>
                    <td><?= $invoice->getId(); ?></td>    
                    <td><?= $invoice->getCustomerName(); ?></td>    
                    <td><?= $invoice->getNumberTickets(); ?></td>    
                    <td><?= $invoice->getDueDate(); ?></td>
                    <td><a href="/admin/invoices/<?= $invoice->getId()?>" class="icon pdf-icon"></a></td>   
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

  </div>
</div>
