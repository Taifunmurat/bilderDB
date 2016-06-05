<form name="login" id="login" action="<?php echo getValue('phpmodule'); ?>" method="post">
	<h1>Login</h1>
	<div id="errorspace">
	</div>
	<div id="informationspace">
	</div>

	<div class="form-group">
		<label for="username" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-4">
			<input type="email" class="form-control" name="username" placeholder="Email" >
		</div>
	</div>
	<br>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" name="password" placeholder="Passwort" >
		</div>
	</div>
	<br>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-default">anmelden</button>
			<button type="reset" name="reset" class="btn btn-default">zurücksetzen</button>
		</div>
	</div>
		<br><br>
</form>