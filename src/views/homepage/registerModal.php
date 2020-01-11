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

.alert {
  margin-top: 1rem;
}

</style>
<script>
$(document).ready(function() {
  <?php
  $registerMsg = "";
  if (isset($_SESSION["registerMsg"])) {
    $registerMsg = $_SESSION["registerMsg"];
    unset($_SESSION["registerMsg"]); 
    echo "$('#register_modal').modal('show');";
  }
  ?>

$("#register_toggle").click(function() {
    $('#login_modal').modal('hide');
    
    setTimeout(() => {
      $('#register_modal').modal('show');
    }, 400);
  });
  
  
});
</script>

<div id="register_modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign up</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/auth/registerSubmit" method="post" class="form login">
      <label for="username">Username</label>
      <input class="form-control validate" name="username" type="text" required>

      <label for="email">Email</label>
      <input class="form-control validate" name="email" type="text" required>



      <label for="password">Password</label>
      <input class="form-control validate" name="password" type="text" required>

      <?php
      if ($registerMsg) {
        echo "<p class='alert alert-danger' id='warning2'>{$registerMsg}</p>";
      }
      ?>
      <!-- <p class="alert alert-danger" id="warning2"><?=$registerMsg?></p> -->
      <input type="submit" name="submit" value="Sign up" class="btn btn-primary">


    </div>
      <div class="modal-footer">
        <section>
      <!-- <button type="button" class="btn btn-secondary">Cancel</button> -->
        </section>
      
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
      </form>
      <section class="create_account">

        <p>Already have an account? <a href="#" id="login_toggle">Sign in</a>.</p>
        
      </section>
    
      </div>

    </div>
  </div>
</div>