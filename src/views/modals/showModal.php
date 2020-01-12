
<?php


?>

<script>
    $(document).ready(function() {
        history.back(1);
    });
    window.onunload = function(){
        $('#confirmation_modal').modal('show');
    };

</script>