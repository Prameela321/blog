<?php
?>
<!DOCTYPE hmtl>
	<html>
 	   <head>
       </head>
		<body>
			<form method="post" action="<?php echo base_url()?>index.php/blog/edit_post">
				<center>
					<fieldset style="position:relative;top:-0px;left:0px;width:150px;">

					<h3>Edit Post</h3>									
						<table cellspacing='15'  width ="0px">
							<tr>
								<td>Name</td>
								<td> <input type="text" name="name" value="<?php echo $post_edit->name ?>"></td>
							</tr>
							<tr>
								<td>Description</td>
								<td> <input type="text" name="description" value="<?php echo $post_edit->description ?>"></td>
							</tr>
							<tr>
								<td>category</td>
								<td> <input type="text" name="category" value="<?php echo $post_edit->category ?>"></td>
							</tr>
							<input type="hidden" value="<?php echo $post_edit->id?>" name="post_id">
						</table>				
									<input type="submit" name="submit">
								
								</fieldset>
				</center>
			</form>
		</body>
</html>
