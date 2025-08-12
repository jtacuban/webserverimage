<?php include('header.php'); ?>

<?php 
	$client_id = $_GET['client_id'];
	
	$client_query = mysql_query("SELECT * FROM client WHERE client_id = '$client_id' ");
	$client_row = mysql_fetch_array($client_query);
	
	

	$id=$_GET['selector'];
	
	$N = count($id);
for($i=0; $i < $N; $i++)
	
	$item_query = mysql_query("SELECT * FROM item WHERE item_id = '$id[$i]' ");
	$item_row = mysql_fetch_array($item_query);
	
?>

<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Releasing</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Releasing</h2>

                <div class="box-icon">
                    <!---    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a> -->
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
			

					
					<?php
						$sql = mysql_query("SELECT * FROM client WHERE client_id = '$client_id' ");
						$row = mysql_fetch_array($sql);
					?>
					<h3>
					Client Name : <span style="color:maroon;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></span>
					</h3>			
					<?php
						$N = count($id);
						for($i=0; $i < $N; $i++)
	
						$sql1 = mysql_query("SELECT * FROM item WHERE item_id = '$id[$i]' ");
						$row1 = mysql_fetch_array($sql1);
					?>
					<h3>
					Item Name : <span style="color:maroon;"><?php echo $row1['item_name']; ?></span>
					</h3>
					
						 
                                  <?php

	$N = count($id);
for($i=0; $i < $N; $i++)

								  $user_query=mysql_query("select * from tbl_release
								LEFT JOIN client ON tbl_release.client_id = client.client_id
								LEFT JOIN release_details ON tbl_release.release_id = release_details.release_id
								LEFT JOIN item on release_details.item_id =  item.item_id 
								WHERE tbl_release.release_id = '$id[$i]'
								  ")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$id=$row['release_id'];
									$item_id=$row['item_id'];
									$release_details_id=$row['release_details_id'];
				
									?>
<?php echo $row['item_name']; ?>
									<?php  }  ?>
					
			
            </div>
        </div>
    </div>
</div><!--/row-->		
<script>		
$(".uniform_on").change(function(){
    var max= 3;
    if( $(".uniform_on:checked").length == max ){
	
        $(".uniform_on").attr('disabled', 'disabled');
		         alert('3 Items allowed per borrow');
        $(".uniform_on:checked").removeAttr('disabled');
		
    }else{

         $(".uniform_on").removeAttr('disabled');
    }
})
</script>		


<?php include('footer.php'); ?>
