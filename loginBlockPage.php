<?php
	echo '
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" method="post" action="index.php">
			  <div class="control-group">								
				<input type="text" id="inputEmail" name="inputEmail" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" id="inputPassword" name="inputPassword" placeholder="Password">
			  </div>
			  <!--
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
			  -->
			 
			  

			  
			  
			  
			<br>
			<button type="submit" class="btn btn-success">Sign in</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<!-- <input type = "submit" class="btn btn-success" value="sbmt"/> -->
			</form>
		  </div>
	</div>';
?>