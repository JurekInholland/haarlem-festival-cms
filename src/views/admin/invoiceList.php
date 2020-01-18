<h1>Invoices</h1>
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
