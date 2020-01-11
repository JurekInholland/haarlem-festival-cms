<?php
// if (isset($_SESSION["loginMsg"])) {
//     $message = $_SESSION["loginMsg"];
//     require "modal.php";
// } else {
//     echo "NO MSG";
// }
?>

<h2>Login</h2>

<form action="/auth/loginSubmit" method="post" class="form">

<input name="username" type="text" placeholder="name" required>
<input name="password" type="text" placeholder="password" required>

<input type="submit" name="submit" value="Login">
</form>