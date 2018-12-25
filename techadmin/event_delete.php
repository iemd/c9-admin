<?php
include("connect.php");
    $id = $_REQUEST['event_id'];
	
	$sql = "DELETE FROM c9_event WHERE event_id = '$id'";
         $result = mysqli_query($conn, $sql);
	// sending query
	/*mysqli_query("DELETE FROM card WHERE id = '$id'")
	or die(mysqli_error());  */	
	
	echo"<script>alert('Successful')</script>";
    echo"<script>location.href='event_create.php'</script>";
	/*header("Location:user_create.php");*/
?>