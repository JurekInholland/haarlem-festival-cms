<style>

footer {
    background-color: brown;
    display: flex;
    flex-wrap: wrap;
    padding: .75rem;
    padding-bottom: 3rem;
}


footer h3 {
    font-weight: bold;
    margin-bottom: .33rem;
}

footer section {
    display: flex;
    flex-direction: column;
    flex: 1 1 275px;
    justify-content: space-between;

    color: white;
    margin: 1rem;
    margin-bottom: 1.5rem;
}



footer section a {
    color: white;
    text-decoration: underline;
    font-size: 1.2rem;
}

footer section input[type=text] {
    /* max-width: 70%; */
    width: 100%;
    /* margin-right: 10px; */
}

footer section .horizontal {
    display: flex;
    flex-direction: row;
    margin-top: 1rem;
}

.horizontal li {
    margin-right: .75rem;
}

.vertical {
    /* list-style-type: disc;
    list-style-position: inside; */
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.vertical li a {
    border-left: 3px solid white;
    border-style: outset;
    padding-left: .5rem;

}

.vertical li:not(:last-of-type) {
    padding-bottom: 1rem;
}

footer form {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 100%;
    margin: 0;
    /* max-width: 420px; */
}

footer form input:last-of-type {
    margin-left: 10px;
    width: 46%;
    /* flex: 30 1 auto; */
    background-color: #169BD5;
    color: white;
    border: none;
    border-radius: 5px;
}

</style>

</section>

<footer>


    <section>
        <h3>Our Sponsors</h3>
    </section>

    <section>
        <h3>Useful links</h3>
        <ul class="vertical">
            <li><a href="/parking">Parking</a></li>
            <li><a href="/house-rules">House Rules</a></li>	
            <li><a href="/faq">FAQ</a></li>
        </ul>
    </section>

    <section>
        <h3>Follow us</h3>
        <p>Follow us on social media to always stay up to date!</p>
        <ul class="horizontal">
            <li><a href="">facebook</a></li>
            <li><a href="">Twitter</a></li>	
            <li><a href="">Instagram</a></li>
        </ul>
    </section>

    <section>
        <h3>Our Newsletter</h3>
       <p>Enter your Email address to subscribe to our newsletter!</p>
    
       <form action="">
            <input type="text" name="newsletter_mail" placeholder="Email address...">
            <input type="submit" value="Subscribe">
       </form>
       
    </section>
</footer>



    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


</body>