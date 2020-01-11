<script>
    $(document).ready(function() {
        console.log("LELFAS");

        history.back(1);
    });
    window.onunload = function(){
        $('#login_modal').modal('show');

    };

</script>