<style>
form {
    display: flex;
    flex-flow: column;
}

.buttons {
    width: 100%;
}

.buttons input {
    width: 100%;
}

</style>

<form action="/auth/registerSubmit" method="POST" class="form">
    <label for="username">Username</label>
    <input type="text" name="username">

    <label for="email">Email</label>
    <input type="text" name="email">

    <label for="email">Confirm Email</label>
    <input type="text" name="email">

    <label for="password">Password</label>
    <input type="text" name="password">

    <section class="buttons">
        <input type="submit" value="Cancel">
        <input type="submit" value="Submit">
    </section>
</form>