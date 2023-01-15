<?php include 'include/logincheck.php';?>
<?php include 'include/functions.php';
 $tablename="buyer"; 
  $title="Buyer";
?>
<?php include 'Label'.$title.'.php'; ?>
<?php
$tag= $_GET['s'];
$idno= $_GET['id'];
		$page = $_GET['page'];

 if($tag=="2")
          {
   $fd1=$_POST["fd1"];
    $fd2=nl2br($_POST["fd2"]);
    $fd3=$_POST["fd3"];
    $fd4=$_POST["fd4"];
    $fd5=$_POST["fd5"];
    $fd6=$_POST["fd6"];
   
    $fd11=nl2br($_POST["fd11"]);
    $fd12=$_POST["fd12"];
   
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE ".$tablename."  SET fd1='$fd1',fd2='$fd2',fd3='$fd3',fd4='$fd4',fd5='$fd5',fd6='$fd6'
,fd11='$fd11',fd12='$fd12' WHERE id=$idno";

if ($conn->query($sql) === TRUE) {
  echo "Updated record successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
   $conn->close();
header('Location:List'.$title.'.php?s=2&page='.$page);			
				}
          

?>

	
        
		 <?php
                
         
        $page = $_GET['page'];  
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                           }
                          $sql = "SELECT * FROM ".$tablename." WHERE id=$idno";
                         $result = $conn->query($sql);
                           if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) {
                               $fd1=$row["fd1"];
    $fd2=$row["fd2"];
    $fd3=$row["fd3"];
    $fd4=$row["fd4"];
    $fd5=$row["fd5"];
    $fd6=$row["fd6"];
   
    $fd11=$row["fd11"];
    $fd12=$row["fd12"];
   
	}
                             } else {
                             echo "0 results";
                              }
                     $conn->close();
                         ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<?php include 'include/headerscripts.php';?>
<![endif]-->
<script>
        function validateForm()
   {
            if(document.getElementById("fd1").value =="")
      {
           alert("Please Enter Name");
           document.getElementById("fd1").focus();
           return false;
      }
      if(document.getElementById("fd2").value =="")
      {
           alert("Please Enter Address");
           document.getElementById("fd2").focus();
           return false;
      }
      if(document.getElementById("fd3").value =="")
      {
           alert("Please Enter State ");
           document.getElementById("fd3").focus();
           return false;
      }
      if(document.getElementById("fd4").value =="")
      {
           alert("Please Enter  Contact No");
           document.getElementById("fd4").focus();
           return false;
      }
      if(document.getElementById("fd6").value =="")
      {
           alert("Please Enter GST no of buyer");
           document.getElementById("fd6").focus();
           return false;
      }
      if(document.getElementById("fd6").value.length !=15)
      {
           alert("Invalid GST No");
           document.getElementById("fd6").focus();
           return false;
      }
   }
</script>
</head>

<body>
        <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php include 'include/preloader.php';?>
    <!-- ============================================================== -->
     <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
         <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <?php include 'include/topheader.php';?>
         <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'include/leftsidebar.php';?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?php echo $title; ?></h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                 <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                             <form class="form-horizontal" action="Edit<?php echo $title;?>.php?s=2&id=<?php echo $idno;?>&page=<?php echo $page;?>"  onsubmit="return validateForm()" method="post">  
                                <div class="card-body">
                                    <h4 class="card-title">Edit <?php echo $title; ?></h4>
                                    
                                    
                                     <div class="form-group row">
                                        <label for="<?php echo $lb1; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb1; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd1" id="fd1"
                                                value="<?php echo $fd1; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb2; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb2; ?></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="fd2" id="fd2">
                                             <?php echo str_replace("<br />","",$fd2,$i); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb3; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb3; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd3" id="fd3"
                                                value="<?php echo $fd3; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb4; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb4; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd4" id="fd4"
                                                value="<?php echo $fd4; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb5; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb5; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd5" id="fd5"
                                                value="<?php echo $fd5; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb6; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb6; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd6" id="fd6"
                                                value="<?php echo $fd6; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="<?php echo $lb11; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb11; ?></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="fd11" id="<?php echo $lb11; ?>">
                                             <?php echo str_replace("<br />","",$fd11,$i); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb12; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb12; ?></label>
                                        <div class="col-sm-9">
                                          <select name="fd12" id="fd12" title="">
                           <option value="1" <?php if($fd12=="1") {echo "selected";} ?>>Supplier</option>
                           <option value="2" <?php if($fd12=="2"){echo "selected";} ?>>Customer</option>
                                         </select>
                                           
                                        </div>
                                    </div>
                                   
                                        
                          
                          </div><!-- cardbody ends -->
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- card ends -->
                         </div> <!-- col-md-6 ends -->
                     </div> <!-- row ends -->              
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                 </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
             <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'include/footer.php';?>
            
            <!-- ============================================================== -->
            <!-- End footer -->
             </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
     <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
      <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php include 'include/js.php';?>
    
    </body>

</html>
    