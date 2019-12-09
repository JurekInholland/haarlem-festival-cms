<style>

.hidden {
    display: none;
}

</style>



<select name="location" id="location">
</select>

<input type="text" name="location" id="new_location" class="hidden">
<input type="text" name="address" id="new_address" class="hidden">



<script>
window.onload = function() {
    var req = new XMLHttpRequest();
    req.responseType = 'json';
    req.open('GET', '/api/locations', true);
    req.onload  = function() {
        var jsonResponse = req.response;


        var locSelect = document.getElementById("location");

        jsonResponse.forEach(el => {
            var option = createOption(el["id"], el["name"]);
            locSelect.appendChild(option);
    });

    locSelect.append(createOption(0, "Add New"));

    };
    req.send();

}

function createOption(value, name) {

    var option = document.createElement("option");

    option.value = value;
    option.innerHTML = name;
    return option;
}

var locSelect = document.getElementById('location');

locSelect.onchange = function() {
    var selected = locSelect.options[locSelect.selectedIndex].text;


    console.log(locSelect.options[locSelect.selectedIndex].value);

    if (selected == "Add New") {
        unhide("new_location");
        unhide("new_address");
    } else {
        hide("new_location");
        hide("new_address");
    }
}

function hide(name) {
    var element = document.getElementById(name);

    element.classList.add("hidden");
}

function unhide(name) {
    var element = document.getElementById(name);

    element.classList.remove("hidden");
}


</script>
