<style>

.wrapper {
    margin-top: 2rem;
    margin: 1rem;
}

form {
    display: grid;
    grid-template-areas:
        'left left right1'
        'left left right2'
        'left left right3'
        'left left right4'
        'left left right5'
        'left left right6'
        'left left right7'
        'left left right8';
    grid-gap: 20px;
    align-items: start;
    margin-bottom: 2rem;
    max-width: 1500px;
    margin: 0 auto;
}

form textarea {
    /* margin-top: 1.5rem; */
    grid-area: left;
    height: 700px;
    width: 100%;
}


form input, select {
    grid-area: right;
    height: 35px;
    width: 100%;
    /* margin-top: 1.5rem; */
}

form input[type=submit] {
    width: 50%;
}


.input0 {
    grid-area: left;
}

.input1 {
    grid-area: right1;
}

.input2 {
    grid-area: right2;
}
.input3 {
    grid-area: right3;
}
.input4 {
    grid-area: right4;
}
.input5 {
    grid-area: right5;
}
.input6 {
    grid-area: right6;
}
.input7 {
    grid-area: right7;
}

form section:last-of-type {
    align-self: end;
}

label {
    margin: 0;
}


@media screen and (max-width: 930px) {
    form {
        grid-template-areas:
        'left'
        'right1'
        'right2'
        'right3'
        'right4'
        'right5'
        'right6'
        'right7'
        'right8';
    }

    form textarea {
        height: 300px;
    }

    
}

</style>

<section class="wrapper">
    
    <form action="">
        <section class="input0">
            <label for="descr" >Event description</label><br>
            <textarea name="descr" id="" ></textarea>
        </section>
        
        <section class="input1">
            <label for="input1">Event Title</label><br>
            <input name="input1" type="text">
        </section>

        <section class="input2">
            <label for="input2">Event Kind</label><br>
            <!-- <input name="input2" type="text"> -->
            <select name="" id="">
                <option value="0">Haarlem Jazz</option>
                <option value="0">Haarlem Food</option>
                <option value="0">Haarlem Dance</option>
                <option value="0">Haarlem Historic</option>
            </select>
        </section>

        <section class="input3">
            <label for="input3">Date</label><br>
            <input name="input3" type="text">
        </section>

        <section class="input4">
            <label for="input4">Time</label><br>
            <input name="input4" type="text">
        </section>

        <section class="input5">
            <label for="input5">Duration</label><br>
            <input name="input5" type="text">
        </section>

        <section class="input6">
            <label for="input6">Ticket Price</label><br>
            <input name="input6" type="text">
        </section>

        <section class="input7">
            <label for="input7">Location</label><br>
            <input name="input7" type="text">
        </section>

        <section class="input8">
            <input type="submit" value="Cancel"><input type="submit" value="Submit">
        </section>


    </form>
</section>