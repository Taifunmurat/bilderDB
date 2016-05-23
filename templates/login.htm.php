<!--<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="stylesheet.css">
		<title>Login</title>
		<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
		<script src="js/anmeldung.js"></script>

	</head>
	<body>
		<div class="sites"> -->
			<form name="login" id="login" action="<?php echo getValue('phpmodule'); ?>" method="post">
				<h1>Login</h1>
				<div id="errorspace">
				</div>
				<div id="informationspace">
				</div>

				<div class="form-group">
					<label for="username" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-4">
						<input type="email" class="form-control" id="username" placeholder="Email">
					</div>
				</div>
				<br>
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" id="password" placeholder="Passwort">
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">anmelden</button>
						<button type="reset"  class="btn btn-default">zurücksetzen</button>
					</div>
				</div>
				<br><br>
				<!--
				<div class="labels">
					<label for="Benutzername">Benutzername:</label><br>
					<label for="Passwort">Passwort:</label><br>
				</div>
				<div class="inputs">
					<input type="email" name="Benutzername" id="username" ><br>
					<input type="password" name="Passwort" id="password" ><br>
					<button type="submit" onclick="test();">senden</button>
					<button type="reset" onclick="Reset("2");">zurücksetzen</button>
				</div>-->
			</form><!--
		</div>
	</body>
</html>-->
