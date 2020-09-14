<?php
?>
<!DOCTYPE hmtl>
	<html>
 	   <head>
       </head>
		<body>
			<form method="post" action="<?php echo base_url()?>index.php/blog/register">
				<center>
					<fieldset style="position:relative;top:-0px;left:0px;width:150px;">
							<div class="background-color:red;"><?php echo validation_errors() ?></div>
							 <div class="background-color:red"><?php  echo $this->session->flashdata('email_duplicate') ?></div> 
					<h3>Register</h3>									
						<table cellspacing='15'  width = '0px'>
							<tr>
								<td>First Name</td>
								<td> <input type="text" name="first_name"></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td> <input type="text" name="last_name"></td>
							</tr>
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
