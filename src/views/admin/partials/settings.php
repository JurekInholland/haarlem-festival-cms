<h2>Locations</h2>
<form action="">
    <?php foreach ($locations as $key => $location):?>
        <input name="<?= $key; ?>" type="text" value="<?= $location; ?>"><br>


    <?php endforeach; ?>
    <input type="text" value=""><br>
    <input type="submit" value="Submit">
</form>
<hr>
<h2>Categories</h2>
<hr>
<h2>Festival Dates</h2>
<hr>

<!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
Collapse
</a>
<section class="collapse" id="collapseExample">
<p>collapse text.....</p>
</section> -->