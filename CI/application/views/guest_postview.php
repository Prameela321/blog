<?php
?>
<!DOCTYPE hmtl>
<html>
<head>
	<style>
		a{
			text-decoration: none;
			color:black;
		}
		.outer {
    	width: 500px; 
    	height: 400px; 
    	margin: 50px auto 0 auto;
    	
		}
		/*.inner {
    	margin: 50px 50px 50px 50px;
    	padding: 10px;
    	display: block;
    	/*border : 2px solid black;*/
      /*}*/
     th,td
      {
          border-bottom: 2px solid black;
          border-right: 2px solid black;
      }
	</style>
	<link rel="stylesheet" hef="<?php echo base_url()?>style/style.css">
</head>
<body>
<!-- <button class="btn purple btn-primary" type="button" onclick="addview()">Add New Post</button> -->
<div class ="outer">
        <div>
          <div>
            <i></i>
            <span>list Of Post(s)</span>
          </div>
          <br>
            <br><br> 
             <div  style="float:right;"> 
             		<input type="text" placeholder="Search By Category" id="search">        
                    <button onclick="addview();" type="button">Search</button>
            </div> 
        </div>
        	
      <div class="portlet-body">
      <table class="inner">
      <thead>
      <tr>
        <!-- <th>Post No.</th>        -->
        <th style="border-left: 2px solid black;">Post Name</th>       
        <th>Description</th> 
        <th>Category</th> 
      </tr>
      </thead>
      <tbody>
      
      <?php if(!empty($post_details))
      {
      	// var_dump($post_details);exit;
      	foreach($post_details as $key =>  $row){ 
      		// var_dump($row->name);exit;
      		?>
      <tr>
            
              <td style="border-left: 2px solid black;> <?php print_r($row->name); ?> </td>
              <td> <?php print_r($row->description); ?> </td>
              <td> <?php  print_r($row->category); ?></td>
      </tr>
      <?php 
  			} 
  		}?>
    
      </tbody>
      </table>
      		<?php
        	if($total_pages)
        	{
			for($i= 1;$i<=$total_pages;$i++)
			 {
				if($i == $page) 
				{ 
					print_r($i);

				}
				else
				{ 
				  echo '<a href="'.base_url().'index.php/blog/guest_postview?page='.$i.'">'.$i.'</a>';
				}
			  }
			}
            ?>
    </div>
</div>
</body>
</html>
<script type='text/javascript'>
	function addview()
    {
     	var search = document.getElementById('search').value;
    	var base_url= window.location.host;
      window.open(base_url+'/CI/index.php/blog/search_post?search='+search);
    }
</script>