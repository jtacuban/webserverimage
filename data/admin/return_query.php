<?php 
include('include/database.php');

$id=$_GET['id'];
$item_id = $_GET['item_id'];

mysql_query("update tbl_release LEFT JOIN release_details on tbl_release.release_id = release_details.release_id   
set release_status='returned',date_return= NOW() 
where tbl_release.release_id='$id' and release_details.item_id = '$item_id'")or die(mysql_error());						
 header('location:return.php');

?>	