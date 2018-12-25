<?php
session_start();
if($_SESSION['email']==""){
    header("location:../index.php");
    }
else{
include("connect.php"); 
         $email = $_SESSION["email"];
         $sql = "select * from c9_admin where email='".$email."'";
         $query = mysqli_query($conn, $sql);
         $row = mysqli_fetch_array($query);
	}
			$_SESSION["email"] = $email;
			if(count($_POST) > 0) {
			  $result = "SELECT * from c9_admin WHERE email='".$email."'";
			 $query = mysqli_query($conn, $result);
			
			$row=mysqli_fetch_array($query);
                
                $current = md5($_POST["currentPassword"]);
			if(($current) == $row["password"]) {
                $newpass = md5($_POST["newPassword"]);
		     $q = "UPDATE c9_admin set password='" . $newpass . "' WHERE email='" . $email . "'";
			$result = mysqli_query($conn,$q);
			$message = "Password Changed";
			} else{ $message = "Current Password is not correct";}
			}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include("imp/head.php"); ?> 
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <?php include("imp/header.php"); ?>
 
  <!-- Left side column. contains the logo and sidebar -->
  <?php include("imp/sidebar.php"); ?>
    
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  >
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
       Change Password
        <small>Manage</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-12">
      <div class="panel-heading">
			  <b style="color:#125478"><center><span class="glyphicon glyphicon-plus"></span>&nbsp; Change Password &nbsp;<span class="glyphicon glyphicon-plus"></span></center>
						  </b>		  
                        </div>
      </div>
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <!--<div class="box-header">
                  <h3 class="box-title">Quick Example</h3>
                </div>--><!-- /.box-header -->
                <!-- form start -->
                
				<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
                  <div class="box-body">
                  <input type="hidden" name="txtid"  value=<?php echo $row['id']; ?>>
                  
				  <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
				  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Current Password</label>
                     
					  <input type="password" name="currentPassword" class="form-control"/><span id="currentPassword"  class="required"></span>
                    </div>
					
										<div class="form-group">
                      <label for="exampleInputPassword1">New Password</label>
                     
					  <input type="password" name="newPassword" class="form-control"/><span id="newPassword" class="required"></span>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputPassword1">Confirm Password</label>
                     
					  <input type="password" name="confirmPassword" class="form-control"/><span id="confirmPassword" class="required"></span>
                    </div>
					
					<!--
      
                -->
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </form>
                
              </div><!-- /.box -->

             


            

            </div><!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("imp/footer.php"); ?>

<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<?php include("imp/script.php"); ?>

<style>
.panel-heading {background: #c0dde8;
    margin-bottom: 10px;}
</style>
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "not same";
output = false;
} 	
return output;
}
</script>
</body>
</html>
