<?php
session_start();
if($_SESSION['email']==""){
    header("location:../index.php");
    }
else{
include("connect.php"); 
        /* $email = $_SESSION["email"];
         $sql = "select * from techadmin where email='".$email."'";
         $query = mysqli_query($conn, $sql);
         $row = mysqli_fetch_array($query);*/
	}
	 $sqlq = "SELECT * FROM c9_event order by event_id desc limit 10";
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
       Event
        <small>Manage</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Event</li>
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
			  <b style="color:#125478"><center><span class="glyphicon glyphicon-plus"></span>&nbsp; Create New Evennt &nbsp;<span class="glyphicon glyphicon-plus"></span></center>
						  </b>		  
                        </div>
              
            <!-- /.box-header -->
            <!-- form start -->
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <br>
                    <div class="form-group col-md-12"><center><p style="font-weight:bold;font-size:15px; color:black;background-color:#ABB2B9;padding:5px;">General Information</p></center></div>
                     <div class="form-group col-md-12">
                      <label for="exampleInputPassword1">Status </label>
                      <input name="status" type="radio" value="1" checked="checked"  >Publish
                      <input name="status" type="radio" value="0" >Not Publish
                    </div>
                    
                            
                            <div class="form-group col-md-6">
                            <label class="control-label">Title</label>
                            <input name="title" required  class="form-control" type="text" placeholder="Enter Title" />
                            </div>
                            
                          
    						
                             <div class="form-group col-md-6">
                            <label class="control-label">Event Purpose</label>
                            <input name="purpose" required  class="form-control" type="text" placeholder="Enter event purpose" />
                            </div>
                            
                           
                             
                             
                             <div class="form-group col-md-6">
                            <label class="control-label">Event Date</label>
                            <input name="event_date"  class="form-control" type="date" placeholder="ENTER FROM DATE" value="<?=( isset( $_POST['date1'] ) ? $_POST['date1'] : '' )?>" />
                            </div>
                             <div class="form-group col-md-6">
                            <label class="control-label">Targeted Paxs</label>
                            <input name="targeted_paxs" required  class="form-control" type="text" placeholder="Enter Targeted Paxs	" />
                            </div>
                            <div class="form-group col-md-6">
                            <label class="control-label">From Time</label>
                            <input name="from_time"  class="form-control" type="time" placeholder="ENTER FROM TIME" value="<?=( isset( $_POST['time1'] ) ? $_POST['time1'] : '' )?>" />
                            </div>
                            
                           
                            
                            <div class="form-group col-md-6">
                            <label class="control-label">To Time</label>
                            <input name="to_time"  class="form-control" type="time" placeholder="ENTER TO TIME" value="<?=( isset( $_POST['time2'] ) ? $_POST['time2'] : '' )?>" />
                            </div>
                            
                            
                            
                            
                            
                             <div class="form-group col-md-6">
                            <label class="control-label">Posted By	</label>
                            <input name="Posted_by" required  class="form-control" type="text" placeholder="Enter Posted By	" />
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

        $newname="event/".$image_name;
        $newname1="../event/".$image_name;

    $copied = copy($_FILES['pic']['tmp_name'], $newname1);
    if (!$copied) 
    {
        echo '<h1>Copy unsuccessfull!</h1>';
        $errors=1;
    }
	 }
      
        $title        = $_POST['title'];
        $description  = $_POST['description'];  
	    $purpose      = $_POST['purpose'];
        $event_date   = $_POST['event_date'];  
	    $from_time    = $_POST['from_time'];
        $to_time      = $_POST['to_time'];  
	    $targeted_paxs= $_POST['targeted_paxs'];
        $Posted_by    = $_POST['Posted_by'];
        $status       = $_POST['status']; 
		//$image        = $_POST['image'];  
		
        $insert = "insert into `c9_event`( `title` ,`description` ,`image`,`event_purpose`, `event_date`, `from_time`, `to_time`,`targeted_paxs`,`posted_by`,`status`) values( '".$title."','".$description."','".$newname."', '".$purpose."','".$event_date."','".$from_time."', '".$to_time."','".$targeted_paxs."', '".$Posted_by."','".$status."')";
         $result = mysqli_query($conn, $insert);
         if($result){
           echo"<script>alert('Record Submitted sucessfully')</script>";
           echo"<script>window.location = 'event_create.php';</script>";
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
              <a href="event_view.php" style="float:right; margin-top:5px; margin-right:5px;" class="btn btn-primary active"><span class="glyphicon glyphicon-picture"></span>&nbsp;View All Events</a>
                     <div class="panel panel-default">
                          <div class="panel panel-default">
                        <div class="panel-heading">
						
                         <b style="color:#125478"><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recently Added Price &nbsp;</center>
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
											<th><span class="glyphicon glyphicon-pencil"></span>&nbsp;Event Id</th>
                                            <th>Title</th>
                                            <th>Created</th>
											<th><span class="glyphicon glyphicon-edit"></span>&nbsp;Status</th>
											<th>&nbsp;Action</th>
								        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
   
     
			
			while($test = mysqli_fetch_array($q))
    {		 $id = $test['event_id'];
			   if($test['status']=='1'){
					$msgstatus = "<span class='label label-success'>Published</span>";
					}
					else{
					$msgstatus = "<span class='label label-warning'>Not Published</span>";
					}
						
	 ?>
		  
    <tr>
        <td><?php echo $i; ?></td>
	<td><?php echo $id; ?></td>
        <td class="center"><?php echo $test['title'] ?></td>
        <td class="center"><?php echo $test['created_at'] ?></td>
         <td class="center"><?php echo $msgstatus; ?></td>
       
        <td class="center dist"><a class="btn btn-info" href="event_update.php?event_id=<?php echo $id ?>">
            <i class="glyphicon glyphicon-zoom-in icon-white"></i></a><a class="btn btn-danger" onClick="return confirm('Are you sure want to delete ?')" href="event_delete.php?event_id=<?php echo $id ?>"><i class="glyphicon glyphicon-trash icon-white"></i></a>
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
