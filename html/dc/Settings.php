<?php include 'include/logincheck.php';?>
<?php include 'include/functions.php';?>

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
           alert("Please Enter Assessment Yr");
           document.getElementById("fd1").focus();
           return false;
      }
      if(document.getElementById("fd2").value =="")
      {
           alert("Please Enter Records to display in each page");
           document.getElementById("fd2").focus();
           return false;
      }

      if(isNaN(document.getElementById("fd2").value))
      {
           alert("Please Enter Valid Number ");
           document.getElementById("fd2").focus();
           return false;
      }
      if(document.getElementById("fd2").value <50)
      {
           alert("Please Enter Records to display greater than or equal to 50");
           document.getElementById("fd2").focus();
           return false;
      }
      
   }
</script>
</head>
<?php

 $tag= $_GET['s'];
    if($tag=="1")
    {        
      $fd1=$_POST["fd1"];
    $fd2=$_POST["fd2"];
   

      $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "UPDATE settings SET fd1='$fd1',fd2='$fd2' WHERE id=1";
     
     if ($conn->query($sql) === TRUE) {
        echo "<div class=\"alert alert-success\" role=\"alert\">Updated record successfully</div>";
       
       
      } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
        }

       $conn->close();
      header('Location:Settings.php?s=2');
       // echo "Product added successfully";
         
    }
    
    // to retieve values into Settings table
    $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM settings WHERE id=1";
                         $result = $conn->query($sql);
                           if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) {
                               $assessmentYear=$row["fd1"];
    $recordsToShow=$row["fd2"];
    
   
	}
                             } else {
                             echo "0 results";
                              }
                     $conn->close();
                         ?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
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
                                <h5 class="card-title">Settings</h5>
                                
   <?php
        if($tag=="2")
    {
        
        echo "<div class=\"alert alert-success\" role=\"alert\">Updated record successfully</div>";
         
    }
    if($tag=="4")
    {
        
        echo "<div class=\"alert alert-success\" role=\"alert\">DB BackUp was successfull</div>";
         
    }
       
       ?>
                               <br>
 <form action="Settings.php?s=1"  onsubmit="return validateForm()"  method="post">
    <div class="form-group row">
                                        <label for="toddress" class="col-sm-3 text-end control-label col-form-label">
      Assessment Year :</label>
                                        <div class="col-sm-9">
       <input type="text" name="fd1"  id="fd1"  value="<?php echo $assessmentYear;?>">
       </div> </div>
       <div class="form-group row">
          <label for="toddress" class="col-sm-3 text-end control-label col-form-label">
      Records to Show :</label>
                                        <div class="col-sm-9">
       <input type="text" name="fd2"  id="fd2" value="<?php echo $recordsToShow;?>">
       </div>
       </div>
       <a href="backup.php">BackUp Database</a><br>
    
    
 
                        </div>
                            <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                               
                            </form>
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
    