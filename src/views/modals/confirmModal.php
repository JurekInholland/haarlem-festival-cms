<style>
#warning {
  color: tomato;

}

/* .login {
  width: 80%;
  margin: 0 auto;
} */

.forgot {
  text-align: end;
  margin-top: .25rem;
  margin-bottom: 1rem;
}

.create_account {
  /* flex: 100%; */
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}


.modal-footer {
  flex-wrap: wrap;
  align-items: center;
}

.modal-footer input {
  margin-top: 0px;
  margin-bottom: 0px;
}

form input[type="text"]:last-of-type {
  margin-bottom: 0;
}
</style>
<script>
$(document).ready(function() {
  
  $('#confirmation_modal').modal('show');

});
</script>

<div id="confirmation_modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= $modal->getTitle(); ?></h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">

        <form action="<?= $modal->getAction(); ?>" method="post" class="form login">
        <p><?= $modal->getContent(); ?></p>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="submit" value="<?= $modal->getSubmit(); ?>" class="btn btn-danger">
      </div>

        
        </form>
        </div>

    
    
        </div>
      </div>
  </div>
</div>