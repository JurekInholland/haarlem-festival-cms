<?php

?>

<style>
table input[type=text] {
    width: 100%;
}

#search {
    position: relative;
    top: -92px;
    right: -.5rem;
    float: right;
    width: 25%;
    min-width: 250px;
}
</style>


<input type="text" name="" id="search">


<form action="/admin/locationsubmit">

<table class="table" id="loc_table">

<thead>
    <tr id="headRow">

        <th scope="col">#</th>
        <th scope="col">Location</th>
        <th scope="col">Address</th>
        <th scope="col">Category</th>
        <th scope="col">Delete</th>

    </tr>
</thead>

<tbody id="table_body">

</tbody>


</table>
<button id="addBtn" onclick="lolFunction()" type="button">Add Location</button>

<input type="submit" name="" id="">
</form>

<script src="/js/index.js" type="module"></script>
