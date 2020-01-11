<?php
if (isset($_SESSION["registerMsg"])) {
    $message = $_SESSION["registerMsg"];
    require "modal.php";
} else {
    echo "NO MSG";
}
?>

<h2>Registerrr</h2>

<form action="/auth/registerSubmit" method="post">

<input name="username" type="text" placeholder="name" required>
<input name="email" type="text" placeholder="email" required>
<input name="password" type="text" placeholder="password" required>



<input type="submit" name="submit" value="Register">
</form>