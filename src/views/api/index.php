<style>

.api_list {
    list-style-type: disc;
    list-style-position: inside;
    display: flex;
    flex-direction: column;
    margin-left: .5rem;
}

</style>

<h1>Haarlem Festival API</h1>

<p>Access the public API via the following endpoints:</p>

<ul class="api_list">
<li><a href="/api/events">/api/events</a></li>
<li><a href="/api/categories">/api/categories</a> // Festival Categories</li>
<li><a href="/api/locations">/api/locations</a></li>
<li><a href="/api/days">/api/days</a></li>
<!-- <li><a href="/api/locations">/api/locations</a></li> -->
<li><a href="/api/pages">/api/pages</a></li>
</ul>

<hr>

<p>These private endpoints require additional authentication:</p>
<li><a href="/api/users">/api/users</a></li>


<?php require "generateapikey.php"; // TODO: check if user is logged in ?>
