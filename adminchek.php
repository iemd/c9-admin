<?php
 session_start();
include("connect.php");
$email=mysqli_real_escape_string($conn, $_POST['email']);
$password=mysqli_real_escape_string($conn, $_POST['password']);
$pass = md5($password);
$sql = "select * from c9_admin where email='".$email."'and password='".$pass."'";
         $result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)<1)
{ 
	echo"<script>alert('Invalid Password')</script>";
	echo"<script>window.history.back()</script>";  
}
else
{
	
    $_SESSION["email"]= $email;
    echo"<script>location.href='techadmin/index.php'</script>";
    
            /*header("Location:techadmin/index.php");*/
}


?>