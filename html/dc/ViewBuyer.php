<?php include 'include/logincheck.php';?>

<?php include 'include/functions.php';
 $tablename="buyer"; 
  $title="Buyer";

?>
<?php include 'Label'.$title.'.php'; ?>
<?php
                                 
         $id= $_GET['id'];                                              
         $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                           }
                           $sql = "SELECT * FROM ".$tablename." WHERE id=$id";
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
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">View <?php echo $title; ?></h4>
                                <div class="form-group row">
                                        <label for="<?php echo $lb1; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb1; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd1" id="fd1"
                                                value="<?php echo $fd1; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb2; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb2; ?></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="fd2" id="fd2" disabled>
                                             <?php echo str_replace("<br />","",$fd2,$i); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb3; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb3; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd3" id="fd3"
                                                value="<?php echo $fd3; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb4; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb4; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd4" id="fd4"
                                                value="<?php echo $fd4; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb5; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb5; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd5" id="fd5"
                                                value="<?php echo $fd5; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="<?php echo $lb6; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb6; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fd6" id="fd6"
                                                value="<?php echo $fd6; ?>" disabled>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="<?php echo $lb11; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb11; ?></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="fd11" id="<?php echo $lb11; ?>" disabled>
                                             <?php echo str_replace("<br />","",$fd11,$i); ?></textarea>
                                        </div>
                                    </div>
                                    
                                   <div class="form-group row">
                                        <label for="<?php echo $lb12; ?>"
                                            class="col-sm-3 text-end control-label col-form-label"><?php echo $lb12; ?></label>
                                        <div class="col-sm-9">
                                         <?php if($fd12=="1") {
                                        ?>

<input type="text" class="form-control" name="fd12"    value="<?php echo "Supplier"; ?>" disabled>

<?php
                                        
                                        }else { ?>
<input type="text" class="form-control" name="fd12"    value="<?php echo "Customer"; ?>" disabled>

                                         <?php } ?>
                                          
                                        </div>
                                    </div>
                                    
                            </div>
                        </div>
                    </div>
                    
                </div>
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
    