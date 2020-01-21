<style>
#warning {
  color: tomato;

}

/* .login {
  width: 80%;
  margin: 0 auto;
} */

#forgot {
  text-align: end;
  /* margin-top: .25rem; */
  margin-top: 0;
  margin-bottom: 1rem;
  border: 0;
  color: #007bff;
  background-color: transparent;
  /* margin-bottom: 1rem; */
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

form input[type="text"]:last-of-type {
  margin-bottom: 0;
}
</style>
<script>
$(document).ready(function() {
  <?php
  $loginmsg = "";
  if (isset($_SESSION["loginMsg"])) {
    $loginmsg = $_SESSION["loginMsg"];
    unset($_SESSION["loginMsg"]); 
    echo "$('#login_modal').modal('show');";
  }
  ?>


$("#login_toggle").click(function() {
    $('#register_modal').modal('hide');
    
    setTimeout(() => {
      $('#login_modal').modal('show');
    }, 400);
  });
  

  $("#modal_toggle").click(function() {
    $('#login_modal').modal('show');
  });
  
  
  
});
</script>

<div id="login_modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign in</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/auth/loginSubmit" method="post" class="form login">
        <label for="username">Username or email address</label>
        <input class="form-control validate" required name="username" type="text">
        
        <label for="password">Password</label>
        <input class="form-control validate" name="password" type="password">

        <input type="button" onclick="this.form.submit();" name="forgot" value="Forgot password?" id="forgot">
        <!-- <a href="/auth/forgot" class="forgot">Forgot password?</a> -->

        <?php
        if ($loginmsg) {
          echo "<p class='alert alert-danger' id='warning2'>{$loginmsg}</p>";
        }
        ?>
        <!-- <p class="alert alert-danger" id="warning2"><?=$loginmsg?></p> -->
        <input type="submit" name="submitbtn" value="Sign in" class="btn btn-primary">


      </div>
        <div class="modal-footer">
          <section>
        <!-- <button type="button" class="btn btn-secondary">Cancel</button> -->
          </section>
        
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
      </form>
      <section class="create_account">

        <p>Don't have an account yet? <a href="#"  id="register_toggle">Sign up</a>.</p>
        
      </section>
    
      </div>
    </div>
    </div>
  </div>
</div>