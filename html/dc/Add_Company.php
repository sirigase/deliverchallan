<?php include 'include/logincheck.php';?>
<?php include 'include/functions.php';
 $tablename="company"; //calls
  $title="Company";
  ?>
  <?php include 'Label'.$title.'.php'; ?>
<?php
 $id= $_GET['id'];
 $tag= $_GET['s'];
 $page = $_GET['page'];

 if($tag==4){
    $fd1=$_POST["fd1"];
    $fd2=nl2br($_POST["fd2"]);
    $fd3=nl2br($_POST["fd3"]);
    $fd5=$_POST["fd5"];
    $fd6=$_POST["fd6"];
    $fd7=$_POST["fd7"];
    $fd8=nl2br($_POST["fd8"]);
   

    $conn = new mysqli($servername, $username, $password, $dbname);
//$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "INSERT INTO ".$tablename."(fd1,fd2,fd3,fd5,fd6,fd7,fd8)
VALUES ('$fd1','$fd2','$fd3','$fd5','$fd6','$fd7','$fd8')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 header('Location:Add_'.$title.'.php?s=1');
                           
 }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<?php include 'include/headerscripts.php';?>
<![endif]-->
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
                        <h4 class="page-title"></h4>
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
                            <form class="form-horizontal" action="Add_<?php echo $title; ?>.php?s=4&page=<?php echo $page; ?>" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Add <?php echo $title; ?></h4>
                                    
                                     <?php
        if($tag=="1")
    {
        
        echo "<div class=\"alert alert-success\" role=\"alert\">".$title." added successfully</div>";
         
    }
    
       
       ?>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb1; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb1; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd1" id="<?php echo $lb1; ?>"
                                               >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb2; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb2; ?></label>
                                        <div class="col-sm-9">
                                          <textarea class="form-control" name="fd2" id="<?php echo $lb2; ?>"></textarea>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb3; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb3; ?></label>
                                        <div class="col-sm-9">
                                          <textarea class="form-control" name="fd3" id="<?php echo $lb3; ?>"></textarea>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="<?php echo $lb5; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb5; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd5" id="<?php echo $lb5; ?>"
                                              >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb6; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb6; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd6" id="<?php echo $lb6; ?>"
                                               >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb7; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb7; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd7" id="<?php echo $lb7; ?>"
                                             >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb8; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb8; ?></label>
                                        <div class="col-sm-9">
                                         <textarea class="form-control" name="fd8" id="<?php echo $lb8; ?>"></textarea>
                                           
                                        </div>
                                    </div>
                                    
                                    
                                    </div> <!-- cardbody ends -->
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
    