<style>
.form {
    display: flex;
    flex-flow: column;
}
.form .horizontal {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    align-items: center;
    line-height: 2rem;
    margin-bottom: 1.5rem;
}

.form .horizontal input[type="radio"]:last-of-type {
    margin-left: 1.5rem;
}
.form .horizontal input[type="checkbox"]:not(:first-of-type) {
    margin-left: 1.5rem;
}

.horizontal label {
    font-weight: normal;
    margin-top: .25rem;
    margin-left: .25rem;
}

</style>

<h2>Export ticket data</h2>

<form action="/admin/tickets" class="form">

<h5>File Type:</h5>
    <section class="horizontal">
        <input type="radio" name="type" value="csv" checked> <label>CSV</label>
        <input type="radio" name="type" value="excel"> <label>Excel</label>
    </section>
   
    <h5>Columns to export:</h5>
    <section class="horizontal">

    <input type="checkbox" name="id" checked> <label>Ticket Id</label>
    <input type="checkbox" name="event" checked> <label>Event Name</label>
    <input type="checkbox" name="username" checked> <label>Ticket Owner</label>
    <input type="checkbox" name="orderDate" checked> <label>Order Date</label>
    <input type="checkbox" name="price" checked> <label>Price</label>
    <input type="checkbox" name="IS_PAID" checked> <label>Paid</label>
    <input type="checkbox" name="TICKET_SCANNED" checked> <label>Scanned</label>
    </section>

    <input type="submit" name="submit" value="Export" class="btn btn-primary">

</form>