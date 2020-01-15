<script>
    $(document).ready(function() {

        history.back(1);
    });
    window.onunload = function(){
        $('#login_modal').modal('show');

    };

</script>