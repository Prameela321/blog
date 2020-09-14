<?php
?>
<!DOCTYPE hmtl>
	<html>
 	   <head>
       </head>
		<body>
			<form method="post" action="<?php echo base_url()?>index.php/blog/add_post">
				<center>
					<fieldset style="position:relative;top:-0px;left:0px;width:150px;">

					<h3>Add Post</h3>									
						<table cellspacing='15'  width ="0px">
							<tr>
								<td>Name</td>
								<td> <input type="text" name="name"></td>
							</tr>
							<tr>
								<td>Description</td>
								<td> <input type="text" name="description"></td>
							</tr>
							<tr>
								<td>category</td>
								<td> <input type="text" name="category"></td>
							</tr>
							
						</table>				
									<input type="submit" name="submit">
								
								</fieldset>
				</center>
			</form>
		</body>
</html>
