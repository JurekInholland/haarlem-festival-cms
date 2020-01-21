<style>
.form {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: space-between;
    margin-bottom: 2rem;
}

.form section {
    /* flex-basis: 50%; */
    min-width: 300px;
    flex-basis: calc(33% - 20px);
    margin: .5rem 0;
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
.editprofile {
    flex-basis: 200px;
    background-color: #f9f9f9;
}

section.profile {
    margin: 1rem;
}

form section:last-of-type {
    margin-bottom: 1rem;
}

.form a, .form input[type=submit] {
    min-width: 300px;
    flex-basis: calc(33% - 20px);
}
</style>

<?php
if ($user->getId() == App::get("user")->getId()) {
    $username = "My";
} else {
    $username = ucfirst($user->getName()) . "'s";
}


if (isset($_GET["edit"])) {
    $inputCls = "form-control";
    $readOnly = "";
    $link = "<input type='submit' name='submitbtn' value='Submit' class='btn btn-primary'>";

} else {
    $inputCls = "form-control-plaintext editprofile";
    $readOnly = "readonly";
    $link = "<a href='/users/profile/{$user->getName()}?edit'>Edit profile</a>";
}
?>
<section class="profile">


<h1><?=$username?> Profile</h1>
<form action="/users/submit" method="POST" class="form">
    <input type="hidden" name="user_id" value="<?=$user->getId()?>">
    <section>
        <label for="">Username</label>
        <input type="text" name="username" <?=$readOnly?> class="<?=$inputCls?>" value="<?=$user->getName()?>">
    </section>

    <section>
        <label for="">Email</label>
        <input type="text" name="email" <?=$readOnly?> class="<?=$inputCls?>" value="<?=$user->getEmail()?>">
    </section>

    <section>
        <label for="">First name</label>
        <input type="text" name="firstname" <?=$readOnly?> class="<?=$inputCls?>" value="<?=$user->getFirstname()?>">
    </section>

    <section>
        <label for="">Last name</label>
        <input type="text" name="lastname" <?=$readOnly?> class="<?=$inputCls?>" value="<?=$user->getLastname()?>">
    </section>

    <section>
        <label for="">Address</label>
        <input type="text" name="address" <?=$readOnly?> class="<?=$inputCls?>" value="<?=$user->getAddress()?>">
    </section>

    <section>
        <label for="">Phone</label>
        <input type="text" name="phone" <?=$readOnly?> class="<?=$inputCls?>" value="<?=$user->getPhone()?>">
    </section>
    <!-- <section>
        <label for="">New Password</label>
        <input type="text" name="password" <?=$readOnly?> class="<?=$inputCls?>" value="">
    </section> -->
    <?=$link?>

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

</section>