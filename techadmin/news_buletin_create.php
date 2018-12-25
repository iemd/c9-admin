<?php
session_start();
if($_SESSION['email']==""){
    header("location:../index.php");
    }
else{
include("connect.php"); 
         /*$email = $_SESSION["email"];
         $sql = "select * from techadmin where email='".$email."'";
         $query = mysqli_query($conn, $sql);
         $row = mysqli_fetch_array($query);*/
	}
	 $sqlq = "SELECT * FROM c9_news_buletin order by post_id desc limit 10";
         $q = mysqli_query($conn, $sqlq);
            $i=1;
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
      <section class="content-header">
      <h1>
       News & Buletin
        <small>Manage</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add News & Buletin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
          <!-- general form elements -->
           <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
			  <b style="color:#125478"><center><span class="glyphicon glyphicon-plus"></span>&nbsp; Create News & Buletin &nbsp;<span class="glyphicon glyphicon-plus"></span></center>
						  </b>		  
                        </div>
              
            <!-- /.box-header -->
            <!-- form start -->
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <br>
                    <div class="form-group col-md-12"><center><p style="font-weight:bold;font-size:15px; color:#fff;background-color:#125478;padding:5px;">General Information</p></center></div>
                     <!--<div class="form-group col-md-12">
                      <label for="exampleInputPassword1">Status </label>
                      <input name="status" type="radio" value="1" checked="checked"  >Publish
                      <input name="status" type="radio" value="0" >Not Publish
                    </div>-->
                    
                            
                            <div class="form-group col-md-6">
                            <label class="control-label">Title</label>
                            <input name="title" required  class="form-control" type="text" placeholder="Enter Title" />
                            </div>
                            
                          
    						
                            
                            <div class="form-group col-md-6">
                            <label class="control-label">Image</label>
                            <input name="pic" required  class="form-control" type="file" placeholder="Enter Image" />
                            </div>
                             <div class='col-md-12'>
                             <label for="exampleInputPassword1">Description</label>
                              <div class='box box-info'>
                                 <textarea id="editor1" name="description" rows="10" cols="80"  tabindex="3">
                                                          
                                    </textarea>
                                  
                              </div>
                            </div>
                            
                             
                            
                    
                            <div class="form-group col-md-12">              
                            <button type="submit" name="btn-create" class="btn btn-primary"> Submit</button>
                            <button type="reset" class="btn btn-default"> Reset </button>  
							</div>                           
                              
                            <div class="box-footer">
                           
                            </div>
                                    </form> 
                                        
                                 <?php
     if(isset($_POST['btn-create'])){
    
    define ("MAX_SIZE","10000");
    
    function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
    }


    $errors=0;

     $image=$_FILES['pic']['name'];
     
     if ($image) 
     {
 
         $filename = stripslashes($_FILES['pic']['name']);
     
          $extension = getExtension($filename);
         $extension = strtolower($extension);
 


        $size=filesize($_FILES['pic']['tmp_name']);


        if ($size > MAX_SIZE*1024)
        {
            echo '<h1>You have exceeded the size limit!</h1>';
            $errors=1;
        }


        $image_name=time().'.'.$extension;

        $newname="new&buletin/".$image_name;
        $newname1="../new&buletin/".$image_name;

    $copied = copy($_FILES['pic']['tmp_name'], $newname1);
    if (!$copied) 
    {
        echo '<h1>Copy unsuccessfull!</h1>';
        $errors=1;
    }
	 }
      
        $title        = $_POST['title'];
        $description  = $_POST['description'];  
	   
		 
		
        $insert = "insert into `c9_news_buletin`( `title` ,`description` ,`image`) values( '".$title."','".$description."','".$newname."')";
         $result = mysqli_query($conn, $insert);
         if($result){
           echo"<script>alert('Record Submitted sucessfully')</script>";
           echo"<script>window.location = 'news_buletin_create';</script>";
            /*header("Location:techadmin/card_create.php");*/
       }
       else{
           echo"<script>alert('Record Not Submitted')</script>";
       }
		  
                }
            
?> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
          
          <div class="col-md-12">
              <a href="news_buletin_view.php" style="float:right; margin-top:5px; margin-right:5px;" class="btn btn-primary active"><span class="glyphicon glyphicon-picture"></span>&nbsp;View All News & Buletin</a>
                     <div class="panel panel-default">
                          <div class="panel panel-default">
                        <div class="panel-heading">
						
                         <b style="color:#125478"><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recently Added News & Buletin &nbsp;</center>
						  </b>
                        </div>
                            <!-- /.row (nested) -->
                    </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover "  id="">
                                    <thead>
                                        <tr style="background-color:#666666; color:#FFFFFF">
                                            <th>Sr No.</th>
											
                                            <th>Title</th>
                                            <th>Created</th>
											
											<th>&nbsp;Action</th>
								        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
   
     
			
			while($test = mysqli_fetch_array($q))
    {		 $id = $test['post_id'];
			   
						
	 ?>
		  
    <tr>
        <td><?php echo $i; ?></td>
	
        <td class="center"><?php echo $test['title'] ?></td>
        <td class="center"><?php echo $test['created_at'] ?></td>
        
       
        <td class="center dist"><a class="btn btn-info" href="news_buletin_update.php?post_id=<?php echo $id ?>">
            <i class="glyphicon glyphicon-zoom-in icon-white"></i></a><a class="btn btn-danger" onClick="return confirm('Are you sure want to delete ?')" href="news_buletin_delete.php?post_id=<?php echo $id ?>"><i class="glyphicon glyphicon-trash icon-white"></i></a>
        </td>
    </tr>
   <?php 
    $i=$i+1;
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
 <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
 <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>

</body>
</html>
