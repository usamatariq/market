<div id="loginModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm">
			<div class="modal-content col-md-10">
			  <div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><b>Login</b></h4>
				</div>
				<div class="modal-body">								
			
					<?php require_once $globe->g_root() . '/ACCOUNT/View/account_login_form.php'; ?> 
				
					<button type="button" class="btn btn-primary btn-center" onclick="fblogin();">Login with Facebook</button>			
				
					
				</div>
			</div>
		</div>
	</div>