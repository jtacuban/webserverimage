	<?php
 	require ('include/database.php');
 	require ('session.php');
	
		$id=$_POST['selector'];
 	$client_id  = $_POST['client_id'];

	if ($id == '' ){
	header("location: release.php");
	?>
	

	<?php }else{

	mysql_query ("insert into tbl_release (client_id,date_borrow) values ('$client_id',NOW()) ") or die(mysql_error());
	
	$query = mysql_query("select * from tbl_release order by release_id DESC")or die(mysql_error());
	$row = mysql_fetch_array($query);
	$release_id  = $row['release_id']; 
	
$history_record=mysql_query("select * from user where user_id=$id_session");
$row1=mysql_fetch_array($history_record);
$user=$row1['firstname']." ".$row1['lastname'];	

$N = count($id);
for($i=0; $i < $N; $i++)
{
		mysql_query("INSERT INTO transaction_history (item_id,action,client_id,release_id,admin_name,date_added) VALUES ('$id[$i]','Borrowing Item','$client_id','$release_id','$user',NOW())")or die(mysql_error());


		mysql_query("insert into release_details (item_id,release_id,release_status) values ('$id[$i]','$release_id','pending')")or die(mysql_error());

}



header("location: release.php");
}  
?>
	
	

	
	