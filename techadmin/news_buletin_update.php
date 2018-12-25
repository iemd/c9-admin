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
    <!--<section class="content-header">
      <h1>
        Employee
        <small>Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Card</li>
      </ol>
    </section>-->

   
      
      
     <section class="content">
         <div class="row">
             <div class="col-md-12">
                    <a href="news_buletin_create.php" style="float:right; margin-top:3px;" class="btn btn-primary">Back</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
			  <b style="color:#125478"><center>Update News & Buletin</center>
						  </b>		  
                        </div>
                                
<?php

include("connect.php"); 
         $id=$_REQUEST['post_id'];
         $sqlq = "select * from c9_news_buletin where post_id='$id'";
         $q = mysqli_query($conn, $sqlq);
         $test=mysqli_fetch_array($q);

if (isset($_POST["btn-upload"]))
{
	$repic=$_FILES['pic']['name'];
	if(!empty($repic)){
        
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
	}
	//include("connect.php");
    
        $title        = $_POST['title'];
        $description  = $_POST['description'];  
	

		$qry="SELECT * FROM `c9_news_buletin` WHERE `post_id`='".$id."'";
		$q = mysqli_query($conn, $qry);
		$data=mysqli_fetch_array($q);
		$picfile="../".$data['image'];
	
if(!empty($image)){
    $q="update c9_news_buletin set title='".$title."',description='".$description."',image='".$newname."' where post_id='$id'";
    unlink($picfile);	
	$result = mysqli_query($conn,$q);
}else {
	 $q="update c9_news_buletin set title='".$title."',description='".$description."' where post_id='$id'"; 
	$result = mysqli_query($conn,$q);
}
	if($result)
			       {
			       echo"<script>alert('Updated Succesfully')</script>";
			  echo"<script>window.location = 'news_buletin_create.php';</script>";
			       }
			    else
			       {
			        echo"<script>alert('Not Updated ')</script>";
			       }
			}
?>	
                 <form role="form" action="" method="post" enctype="multipart/form-data">
                            <br>
                    <div class="form-group col-md-12"><center><p style="font-weight:bold;font-size:15px; color:white;background-color:#125478;padding:5px;">General Information</p></center></div>
                            
                            <div class="form-group col-md-12">
                            <label class="control-label">Title</label>
                            <input name="title" required  class="form-control" type="text" value="<?php echo $test['title'];?>" />
                            </div>
                     
                  
                      <div class="form-group col-md-6">
                            <label class="control-label">Image</label>
                            <input name="pic"   class="form-control" type="file" value="<?php //echo $test['image'];?>"/>
                            </div>
                               <div class="form-group col-md-6">
                              <label for="exampleInputFile">Uploaded Event Image</label>
                              <img src="../<?=$test['image']?>" width="100" height="70">
                            </div>
                          
                           
    						
                            
                           
                               
                           
                          
                            <div class='col-md-12'>
                             <label for="exampleInputPassword1">Description</label>
                              <div class='box box-info'>
                                 <textarea id="editor1" name="description" rows="10" cols="80"  tabindex="3">
                                         <?php echo $test['description']; ?>                 
                                    </textarea>
                                  
                              </div>
                            </div>
                     
                            <div class="form-group col-md-12">
				            <button type="submit" name="btn-upload" class="btn btn-primary">Update</button>
                            </div>                                      
                            <div class="box-footer">
                         
                            </div>
                                        
                                    </form>
                            </div>
             
             
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
