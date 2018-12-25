<?php
include("connect.php");
    $id = $_REQUEST['post_id'];
	
	$sql = "DELETE FROM c9_news_buletin WHERE post_id = '$id'";
         $result = mysqli_query($conn, $sql);
	// sending query
	/*mysqli_query("DELETE FROM card WHERE id = '$id'")
	or die(mysqli_error());  */	
	
	echo"<script>alert('Successful')</script>";
    echo"<script>location.href='news_buletin_create.php'</script>";
	/*header("Location:user_create.php");*/
?>