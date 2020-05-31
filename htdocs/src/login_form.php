<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" action = "/Login" method = "post">
      
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="defaultForm-email" class="form-control validate" name = "USERNAME" required>
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your username</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate" name = "PASSWORD" required>
          <label data-error="wrong" data-success="right" for="defaultForm-pass" >Your password</label>
        </div>

        <div class="md-form mb-4">
          <input type="checkbox" id="defaultForm-pass" name = "SHOWPASSWORD">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Show password.</label>
       </div>

      </div>
      
      <div class="modal-footer d-flex justify-content-center">
        <input type = "submit" value = "Login" class="btn btn-dark">
      </div>
      
       	<div class="modal-footer d-flex justify-content-center">
			<p>You do not have an account? CLICK <a href = "#" data-toggle="modal" data-target="#modalRegisterForm">HERE</a> to create one.</p>      
		</div>

    </form>
  </div>
</div>