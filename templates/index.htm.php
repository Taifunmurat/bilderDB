<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
	<link rel="stylesheet" href="css/bootstrap-image-gallery.min.css">
	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/javascript.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
	<script src="js/bootstrap-image-gallery.min.js"></script>
	<title>Bilderdatenbank</title>
</head>
<body>
	<div align="center">
		<table class="top" width="1004" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td id="topimg" width="1004" height="100" colspan="2"></td>
			</tr>
			<tr>
			  <td class="header" height="20" colspan="2">
			  </td>
			</tr>
			<tr>
				<td class="nav" width="200" valign="top" align="center">
                    <?php echo getMenu(getValue(getValue('menu_eintraege')), getValue('menu_titel')); ?>
				</td>

				<td class="content" width="804" valign="top" align="left">
                    <table border="0" width="100%" cellpadding="5" cellspacing="0">
						<tr>
							<td>
								<div id="errorspace">
									<?php echo getValue('errorspace');?>
								</div>
								<div id="informationspace">
									<?php echo getValue('informationspace');?>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo getValue('inhalt');?>
							</td>
						</tr>
                    </table>
                </td>
			</tr>
			<tr>
				<td colspan="2">
					<table class="bottom" width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr height="5">
							<td class="footer" height="15">
								<span class="wb10">&copy; Copyright IET-gibb</span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>