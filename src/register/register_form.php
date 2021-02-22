<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" action = "src/register/register_src.php" method = "post">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
      <div class="modal-body mx-3">
      	<div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="defaultForm-username" name = "USERNAME" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Username</label>
      	</div>
      
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" name = "EMAIL" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
       </div>

       <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="reg-form-pass" name = "PASSWORD" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="reg-form-pass">Password</label>
       </div>
        
       <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="reg-form-repeatpass" name = "REPEATPASSWORD"class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="reg-form-repeatpass">Repeat password</label>
       </div>

       <div class="md-form mb-4">
          <input type="checkbox" id="reg-form-check" name = "SHOWPASSWORD" onclick = "showPasswordReg()">
          <label data-error="wrong" data-success="right" for="reg-form-check" >Show password.</label>
       </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type = "submit" value = "Register" class="btn btn-dark">
      </div>
    </form>
  </div>
</div>