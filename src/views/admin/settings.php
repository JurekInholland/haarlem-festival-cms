<style>
select {
    width: 200px;
}

input[type=submit] {
    width: 200px;
}

input[type=button] {
    width: 70px;
}

.color {
    width: 70px;
}

h3 {
    margin-bottom: .5rem;
}

</style>



<form action="/admin">
   
<h3>Categories</h3>
    <div class="form-group" id="categories">
        <?php foreach ($categories as $key => $category):?>

        <div class="input-group">
            <input name="new_category<?= $key; ?>" type="text" value="<?= $category->getName(); ?>">
            
            <input name="color<?= $key; ?>" class="color" style="background-color: <?= $category->getColor(); ?>" name="<?= $key; ?>" type="text" value="<?= $category->getColor(); ?>">
            <!-- <input type="button" value="Delete"> -->
            <button type="button" onclick="myFunction(<?= $key; ?>)">Delete</button>
            <br>
        </div>

        <?php endforeach; ?>

        <!-- <input name="new_category<?= $key+1; ?>" type="text" value="">
        <label for="color">#</label>
        <input name="color" class="color" name="new_color" type="text" value="">
        <input type="button" value="Add"> -->
        </div>
        <button type="button" onclick="addCategory()">Add</button>

    
<hr>
<h3>Festival Dates</h3>

<label for="start_date">First day: </label>
<input name="start_date" type="date">

<label for="end_date">Last day: </label>
<input name="end_date" type="date">
<hr>
<input type="submit" name="confirm">
</form>

<script>

    function myFunction(a) {
        // return 100;
        console.log(a);
        console.log("myfunc");
        var eles = document.getElementsByName("new_category" + a);

        eles[0].parentNode.remove();

        console.log(eles);
    }

    function addCategory() {
        var node = document.createElement("input");

        var categories = document.getElementById("categories");

        console.log(categories.childNodes.length);

        document.getElementById("categories").appendChild(node);
    }

</script>
<!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
Collapse
</a>
<section class="collapse" id="collapseExample">
<p>collapse text.....</p>
</section> -->