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
      th
      {
      	border-top: 2px solid black;
      }
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
            		 <div class="background-color:red"><?php  echo $this->session->flashdata('search_error') ?></div>
            		 <div class="background-color:red"><?php  echo $this->session->flashdata('login') ?></div>  
            <span>list Of Post(s)</span>
          </div>
          <br>
          	<div>         
                    <button type="button" style="float:right;"><a href="<?php echo base_url()?>index.php/blog/add_post">Add New Post</a></button>

            </div>
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
        <!-- <h>Postt No.</th>        -->
        <th style="border-left: 2px solid black;">Post Name</th>       
        <th>Description</th> 
        <th>Category</th> 
        <th>Action</th> 
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
            
              <td style="border-left: 2px solid black;"> <?php print_r($row->name); ?> </td>
              <td> <?php print_r($row->description); ?> </td>
              <td> <?php  print_r($row->category); ?></td>
              <td><a href="<?php echo base_url()?>index.php/blog/edit_post?id=<?php echo $row->id;?>">Edit |</a>
              <a href="<?php echo base_url()?>index.php/blog/delete_post?id=<?php echo $row->id;?>">Delete</a></td>
      </tr>
      <?php 
  			} 
  		}?>
    
      </tbody>
      </table>
      	<center>
      		<?php
        	if($total_pages)
        	{
        		echo 'pages : ';
			for($i= 1;$i<=$total_pages;$i++)
			 {
				if($i == $page) 
				{ 
					echo $i.' ';

				}
				else
				{ 
				  echo '<a href="'.base_url().'index.php/blog/view_post?page='.$i.'">'.$i.' </a>';
				}
			  }
			}
            ?>
         </center>
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