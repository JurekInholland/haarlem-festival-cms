<style>
.form {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
}

.form section {
    /* flex-basis: 50%; */
    min-width: 300px;
}
</style>

<h1><?=$user->getName()?>'s Profile</h1>

<form action="" class="form">

<section>
    <label for="">Username</label>
    <input type="text" name="" readonly class="form-control-plaintext" value="Jurek">
</section>

<section>
    <label for="">Email</label>
    <input type="text" name="" readonly class="form-control-plaintext" value="jurek.baumann@gmail.com">
</section>

<!-- <section>
    <label for="">New Password</label>
    <input type="text" name="" readonly class="form-control-plaintext" value="">
</section> -->

<section>
    <label for="">First name</label>
    <input type="text" name="" readonly class="form-control-plaintext" value="Jurek">
</section>

<section>
    <label for="">Last name</label>
    <input type="text" name="" readonly class="form-control-plaintext" value="Baumann">
</section>

<section>
    <label for="">Phone</label>
    <input type="text" name="" readonly class="form-control-plaintext" value="+3162134">
</section>

<section>
    <label for="">Phone</label>
    <input type="text" name="" readonly class="form-control-plaintext" value="Jurek">
</section>


</form>