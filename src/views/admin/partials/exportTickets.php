<style>

.form .horizontal {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    align-items: center;
    line-height: 2rem;
    margin-bottom: 1.5rem;
}

.form .horizontal input[type="radio"]:last-of-type {
    margin-left: 1rem;
}
.form .horizontal input[type="checkbox"]:not(:first-of-type) {
    margin-left: 1rem;
}



</style>

<h2>Export ticket data</h2>

<form action="/admin/tickets" class="form">

<h5>File Type:</h5>
    <section class="horizontal">
        <input type="radio" name="type" value="csv" checked> CSV
        <input type="radio" name="type" value="excel"> Excel
    </section>
   
    <h5>Columns to export:</h5>
    <section class="horizontal">

    <input type="checkbox" name="id" checked> Ticket Id<br>
    <input type="checkbox" name="event" checked> Event Name<br>
    <input type="checkbox" name="username" checked> Ticket Owner<br>
    <input type="checkbox" name="orderDate" checked> Order Date<br>
    <input type="checkbox" name="price" checked> Price<br>
    <input type="checkbox" name="IS_PAID" checked> Paid<br>
    <input type="checkbox" name="TICKET_SCANNED" checked> Scanned<br>
    </section>

    <input type="submit" name="submit" value="Export" class="btn btn-primary">

</form>