<?php
//error_reporting(E_ALL ^ E_WARNING);
error_reporting(0);
ob_start();
session_start();

include 'include/functions.php';?>
<?php

 $tag= $_GET['s'];
  if($_SERVER["REQUEST_METHOD"]=="POST"){
 if($tag==1){
$username1=test_input($_POST["uname"]);
$password1=test_input($_POST["pass"]);
 $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                           }
                           if($username1!="" && $password1!=""){
                          $sql = "SELECT * FROM login WHERE fd1='$username1' AND fd2='$password1'";
                         $result = $conn->query($sql);
                           if ($result->num_rows > 0) {
                             echo "Login Success";
                            $_SESSION["prem"] = time();
                           
                            header('Location:help.php?s=1');
                           }
                           else
                           {
                            //echo "Login Failed";
                           }
                           }
 }
  }

?><!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<?php include 'include/headerscripts.php';?>
<![endif]-->
<script>
        function validateForm()
   {
          if(document.getElementById("uname").value =="") 
      {
           alert("Username Cannot be empty");
           document.getElementById("uname").focus();
           return false;
      }
        if(document.getElementById("pass").value =="") 
      {
           alert("Password Cannot be empty ");
           document.getElementById("pass").focus();
           return false;
      }
      
   }
</script> 
</head>

<body>
       <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center pt-3 pb-3">
                        <span class="db"></span>
                    </div>
                     <?php if($_SESSION["prem"]==""){
                
              ?>
                    <!-- Form -->
                    <form class="form-horizontal mt-3" id="loginform" method="post" autocomplete="off" onsubmit="return validateForm()" action="Login.php?s=1">
                    
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Username" name="uname" id="uname" aria-label="Username" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg"  placeholder="Password" name="pass" id="pass" aria-label="Password" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3">
                                       <!-- <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock me-1"></i> Lost password?</button> -->
                                        <button class="btn btn-success float-end text-white" type="submit">Login</button>
                                        <br><br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br><br>
                          
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    <?php
                }
                else{
                 header('Location:help.php?s=1');
                    echo "User Already Logged-In";
                }
                ?>
                </div>
                
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
       </div>
     <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
      <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php include 'include/js.php';?>
     <script>

    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>
    </body>

</html>
    