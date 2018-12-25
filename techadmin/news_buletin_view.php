<?php
session_start();
if($_SESSION['email']==""){
    header("location:../index.php");
    }
else{
       include("connect.php"); 
      /* $email=$_SESSION["email"];
       $sql = "select * from techadmin where email='$email'";
       $query = mysqli_query($conn, $sql);
       $row=mysqli_fetch_array($query);*/
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
  <!--  <section class="content-header">
      <h1>
        Card
        <small>Manage</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List All Card</li>
      </ol>
    </section>-->
      
      
      
      
      
      
      
     <section class="content">
         <div class="row">
             <div class="col-md-12">
              <a href="news_buletin_create.php" style="float:right; margin-top:5px;" class="btn btn-primary"><span class="glyphicon glyphicon-picture"></span>&nbsp; Create News & buletin</a>
                     <div class="panel panel-default">
                          <div class="panel panel-default">
                        <div class="panel-heading">
						
                         <b style="color:#125478"><center><!--<span class="glyphicon glyphicon-user"></span>-->&nbsp; News & buletin Details &nbsp;<!--<span class="glyphicon glyphicon-user"></span>--></center>
						  </b>
                        </div>
                            <!-- /.row (nested) -->
                    </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover  "  id="example1">
                                    <thead>
                                        <tr style="background-color:#666666; color:#FFFFFF">
											<th><span class="glyphicon glyphicon-pencil"></span>&nbsp;Post Id</th>
                                            <th>Title</th>
                                            <th>Discription</th>
											
											<th>&nbsp;Action</th>
											</tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
        include 'connect.php';
         $sqlq = "SELECT * FROM `c9_news_buletin`";
         $q = mysqli_query($conn, $sqlq);
		// print_r($q);
			while($test = mysqli_fetch_array($q))
			 //print_r($test);
			
    {        $id=$test['post_id']; 
	       
						
		   ?>
    <tr>
	<td><?php echo $id;?></td>
        <td class="center"><?php echo $a= $test['title']; ?></td>
        <td class="center"><?php echo $test['description']; ?></td>
     
      <td class="center dist"><a class="btn btn-info" href="news_buletin_update?post_id=<?php echo $id ?>">
            <i class="glyphicon glyphicon-zoom-in icon-white"></i></a><a class="btn btn-danger" onClick="return confirm('Are you sure want to delete ?')" href="news_buletin_delete?post_id=<?php echo $id ?>"><i class="glyphicon glyphicon-trash icon-white"></i></a>
        </td>
    </tr>
   <?php 
   }
   ?>
                                        
    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            
             
             
         </div>
      </section> 
      
 
      
      
      
      
      
      
      
      
      
   
      
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
