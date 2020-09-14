<?php
?>
<!DOCTYPE hmtl>
	<html>
 	   <head>
       </head>
		<body>
			<form method="post" action="<?php echo base_url()?>index.php/blog/login">
				<center>
					<fieldset style="position:relative;top:-0px;left:0px;width:auto;">
							<div class="background-color:green;"><?php  echo $this->session->flashdata('register') ?></div>
					<h3>LOGIN</h3>									
						<table cellspacing='15'  width = '0px'>
							<tr>
								<td>Email</td>
								<td> <input type="email" name="email"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td> <input type="password" name="password"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit"></td>
						    </tr>
						</table>
						</fieldset>
				</center>
			</form>
		</body>
</html>
