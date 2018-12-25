<?php
session_start();
if($_SESSION['email']==""){
    header("location:../index.php");
    }
else{
include("connect.php"); 
 $email=$_SESSION["email"];
$sql = "select * from techadmin where email='$email'";
         $query = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($query);
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
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!--<section class="content-header">
      <h1>
        Transaction
        <small>Manager</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Price</li>
      </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
          <!-- general form elements -->
           <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
			  <b style="color:red"><center>PARKING ASSISTANCE </center>
						  </b>		  
                        </div>
              
            <!-- /.box-header -->
            <!-- form start -->
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <br>
                    <!--<div class="form-group col-md-12"><center><p style="font-weight:bold;font-size:15px; color:white;background-color:#125478;padding:5px;">General Information</p></center></div>-->
                            
                            <!--<div class="form-group col-md-12">
                            <label class="control-label">Enter Card ID</label>
                            <input name="card_id" required  class="form-control" type="text" placeholder="ENTER CARD ID" />
                            </div>-->
                            
                            <div class="form-group col-md-12">
                            <label class="control-label">Enter User Name</label>
                            <input name="user_name"  class="form-control" type="text" placeholder="ENTER USER NAME" value="<?=( isset( $_POST['user_name'] ) ? $_POST['user_name'] : '' )?>" />
                            </div>
                            
                            <div class="form-group col-md-6">
                            <label class="control-label">FROM DATE</label>
                            <input name="date1"  class="form-control" type="date" placeholder="ENTER FROM DATE" value="<?=( isset( $_POST['date1'] ) ? $_POST['date1'] : '' )?>" />
                            </div>
                            
                            <div class="form-group col-md-6">
                            <label class="control-label">FROM TIME</label>
                            <input name="time1"  class="form-control" type="time" placeholder="ENTER FROM TIME" value="<?=( isset( $_POST['time1'] ) ? $_POST['time1'] : '' )?>" />
                            </div>
                            
                            <div class="form-group col-md-6">
                            <label class="control-label">TO DATE</label>
                            <input name="date2"  class="form-control" type="date" placeholder="ENTER TO DATE" value="<?=( isset( $_POST['date2'] ) ? $_POST['date2'] : '' )?>" />
                            </div>
                            
                            <div class="form-group col-md-6">
                            <label class="control-label">TO TIME</label>
                            <input name="time2"  class="form-control" type="time" placeholder="ENTER TO TIME" value="<?=( isset( $_POST['time2'] ) ? $_POST['time2'] : '' )?>" />
                            </div>
    
                            
                    
                            <div class="form-group col-md-12">              
                            <button type="submit" name="btn-search" class="btn btn-danger active"> Search</button>
                            <button type="submit" name="reset1" class="btn btn-default"> Reset </button> 
							</div>                           
                              
                            <div class="box-footer">
                           
                            </div>
                                    </form> 
                                        
                                 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
          
          
          
          
          
          <!---- table code -->
       
           
          <?php
     if(isset($_POST['reset1'])){
         echo"<script>location.href='assistance.php'</script>";
     }
    
         ?>
          
           
                     <div class="col-md-12">
                     <div class="panel panel-default">
                          <div class="panel panel-default">
                        <div class="panel-heading">
						
                         <b style="color:#125478"><center>CUSTOMER DETAILS</center>
						  </b>
                        </div>
                            <!-- /.row (nested) -->
                    </div>
                         
                         <?php
     if(isset($_POST['btn-search'])){
    
        
        //if else code
         include'connect.php';    
            $user_name        =$_POST['user_name']; 
            $date1       =$_POST['date1']; 
            $time11       =$_POST['time1'];  
            $time1= $date1." ".$time11; 
            $date2       =$_POST['date2']; 
            $time21       =$_POST['time2'];  
            $time2= $date2." ".$time21;
         if(empty($user_name) && empty($date1) && empty($time11) && empty($date2) && empty($time21) )
         { echo "Please Enter User Name";}
         else{
             if(!empty($user_name) && empty($date1) && empty($time11) && empty($date2) && empty($time21)){
                 ?>
                         <div class="row">
                         <div class="col-md-12" >
                         
                         <?php
                 $query1 = "SELECT * FROM login_detail where user_name='$user_name'";
                    $fetch1 = mysqli_query($conn, $query1);
                        $count1=mysqli_num_rows($fetch1);  
                 $total_car=0;$total_p=0;
                 if($count1 > 0){
                        while($loop1 = mysqli_fetch_array($fetch1)){
                        $login_time = $loop1['login_time'];
                          $logout_time = $loop1['logout_time'];
                           
                            $query = "SELECT * FROM transaction where login_time='$login_time' and user_name='$user_name' ";
                            $fetch = mysqli_query($conn, $query);
                            $count2=mysqli_num_rows($fetch); 
                            $total_car=$total_car+$count2; 
                            $total_price=0;
                            if($count2 > 0){
                                
                         while($loop2 = mysqli_fetch_array($fetch)){
                                $card_price = $loop2['card_price'];
                                $total_price=$total_price+$card_price;
                              }
                               $total_p= $total_p+$total_price;
                                
                            
                                
               ?>
                         <div class="col-md-4" style="color:red"><p><?php echo "User Name : ".$user_name;?></p>
                                <p><?php echo "Total cars : ".$count2;?></p>
                                <p><?php echo "login_time.".$login_time;?></p>
                                <p><?php echo "logout_time.".$logout_time;?></p>
                                <p><?php echo "Total price : ".$total_price;?></p>
                                <p><?php echo "<hr>";?></p></div>
                                
                <?php
                                
                        }  
                  }
		   ?>
                            </div>
                             <div class="col-md-12">
                                 <center>
                                     <p><?php echo "User Name : ".$user_name;?></p>
                                     <p><?php echo "Total Cars : ".$total_car;?></p>
                                     <p><?php echo "Total Price : ".$total_p;?></p>
                                 </center>
                             </div>
                            <!-- /.table-responsive -->
                            
                        </div>
		  <?php
                 }
                 else{
                     echo "No Details found";
                 }
             }
                 
                 
            
             
             
             
             
             else{
                 if(!empty($user_name) && !empty($date1) && !empty($time11) && !empty($date2) && !empty($time21)){
                 ?>
                         <div class="row">
                         <div class="col-md-12" >
                         
                         <?php
                 $query1 = "SELECT * FROM login_detail where user_name='$user_name' and  (date BETWEEN '$date1' AND '$date2') and (login_time BETWEEN '$time1' AND '$time2') ";
                    $fetch1 = mysqli_query($conn, $query1);
                        $count1=mysqli_num_rows($fetch1);  
                 $total_car=0;$total_p=0;
                 if($count1 > 0){
                        while($loop1 = mysqli_fetch_array($fetch1)){
                        $login_time = $loop1['login_time'];
                          $logout_time = $loop1['logout_time'];
                           
                            $query = "SELECT * FROM transaction where login_time='$login_time' and user_name='$user_name' ";
                            $fetch = mysqli_query($conn, $query);
                            $count2=mysqli_num_rows($fetch); 
                            $total_car=$total_car+$count2; 
                            $total_price=0;
                            if($count2 > 0){
                                
                         while($loop2 = mysqli_fetch_array($fetch)){
                                $card_price = $loop2['card_price'];
                                $total_price=$total_price+$card_price;
                              }
                               $total_p= $total_p+$total_price;
                                
                            
                                
               ?>
                         <div class="col-md-4" style="color:red"><p><?php echo "User Name : ".$user_name;?></p>
                                <p><?php echo "Total cars : ".$count2;?></p>
                                <p><?php echo "login_time.".$login_time;?></p>
                                <p><?php echo "logout_time.".$logout_time;?></p>
                                <p><?php echo "Total price : ".$total_price;?></p>
                                <p><?php echo "<hr>";?></p></div>
                                
                <?php
                                
                        }  
                  }
		   ?>
                            </div>
                             <div class="col-md-12">
                                 <center>
                                     <p><?php echo "User Name : ".$user_name;?></p>
                                     <p><?php echo "Total Cars : ".$total_car;?></p>
                                     <p><?php echo "Total Price : ".$total_p;?></p>
                                 </center>
                             </div>
                            <!-- /.table-responsive -->
                            
                        </div>
		  <?php
                 }
                 else{
                     echo "No Details found";
                 }
             }
                 
                 
                 
                 
                 
                 
                 
                 else{
                 if(!empty($user_name) && !empty($date1) && !empty($date2)){
                 ?>
                         <div class="row">
                         <div class="col-md-12" >
                         
                         <?php
                 $query1 = "SELECT * FROM login_detail where user_name='$user_name' and  (date BETWEEN '$date1' AND '$date2')";
                    $fetch1 = mysqli_query($conn, $query1);
                        $count1=mysqli_num_rows($fetch1);  
                 $total_car=0;$total_p=0;
                 if($count1 > 0){
                        while($loop1 = mysqli_fetch_array($fetch1)){
                        $login_time = $loop1['login_time'];
                          $logout_time = $loop1['logout_time'];
                           
                            $query = "SELECT * FROM transaction where login_time='$login_time' and user_name='$user_name' ";
                            $fetch = mysqli_query($conn, $query);
                            $count2=mysqli_num_rows($fetch); 
                            $total_car=$total_car+$count2; 
                            $total_price=0;
                            if($count2 > 0){
                                
                         while($loop2 = mysqli_fetch_array($fetch)){
                                $card_price = $loop2['card_price'];
                                $total_price=$total_price+$card_price;
                              }
                               $total_p= $total_p+$total_price;
                                
                            
                                
               ?>
                         <div class="col-md-4" style="color:red"><p><?php echo "User Name : ".$user_name;?></p>
                                <p><?php echo "Total cars : ".$count2;?></p>
                                <p><?php echo "login_time.".$login_time;?></p>
                                <p><?php echo "logout_time.".$logout_time;?></p>
                                <p><?php echo "Total price : ".$total_price;?></p>
                                <p><?php echo "<hr>";?></p></div>
                                
                <?php
                                
                        }  
                  }
		   ?>
                            </div>
                             <div class="col-md-12">
                                 <center>
                                     <p><?php echo "User Name : ".$user_name;?></p>
                                     <p><?php echo "Total Cars : ".$total_car;?></p>
                                     <p><?php echo "Total Price : ".$total_p;?></p>
                                 </center>
                             </div>
                            <!-- /.table-responsive -->
                            
                        </div>
		  <?php
                 }
                 else{
                     echo "No Details found";
                 }
             }
                     else{
                         echo "Fill All Fields";
                     }
                }
                 
             }
         }
             
		
		   ?>
                                        
                                       
                                 
                                
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                               
        
		  <?php
                }
            
?>
                    </div>
                    <!-- /.panel -->
                
               
          
          
          
          
          
       
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
    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
