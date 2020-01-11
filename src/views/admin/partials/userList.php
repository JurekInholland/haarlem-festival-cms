<style>
/* table tr:hover {
    background-color: grey;
} */

.top {
    width: 100%;
    display: flex;
    flex-flow: row;
    justify-content: space-between;
}

.search {

}

.fa-search {
    background-image: url("/img/search.svg");
    /* background-size: 90%; */
    width: 20px;
    height: 20px;
    background-repeat: no-repeat;
    margin-right: -5px;
}
</style>


<?php
// $users = [
//     ["id" => 1, "name" => "Jurek", "role" => "User", "email" => "jurek.baumann@gmail.com"],
//     ["id" => 2, "name" => "Admin", "role" => "Admin", "email" => "admin@email.com"],
// ];

?>
<!-- Search form -->
<section class="top">
<h1>User information</h1>

<form class="form-inline search" method="GET" action="/admin/users">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control" type="text" placeholder="Search"
    aria-label="Search" name="q">
</form>
</section>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($users as $idx => $user) :
        ?>

        <tr>
       

            <td><?= $user->id; ?></td>
            <td> <a href="/admin/users/<?= $user->name; ?>"> <?= $user->name; ?> </a></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->getRoleReadable(); ?></td>
            <td>edit</td>
            <td>delete</td>
    
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>