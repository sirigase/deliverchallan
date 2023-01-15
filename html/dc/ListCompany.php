<?php include 'include/logincheck.php';?>
<?php include 'include/functions.php';
 $tablename="company"; //calls
  $title="Company";
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<?php include 'include/headerscripts.php';?>
<![endif]-->
<script> 
		function deleteFormItem(x) {
		
    var r = confirm("Delete <?php echo $title; ?> proceed?");
if (r == true) {
 
  window.location.href = "List<?php echo $title; ?>.php?s=4&id="+x;
  
} 
   
   }
   </script> 
		
         <script>
function showCustomertable(str) {
 //this shall be discarded
  if (str == "") {
		window.location.href = "List<?php echo $title; ?>.php";
    //document.getElementById("customertable").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("customertable").innerHTML = this.responseText;
				document.getElementById("alldatatable").innerHTML = "";
				}
    };
   xmlhttp.open("GET","<?php echo $title; ?>search.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
		<script>
        function validateForm()
   {
            
   }
   function validateSearchForm()
   {
            if(document.getElementById("searchcus").value =="")
      {
           alert("Please Enter Any Word in Search");
           document.getElementById("searchcus").focus();
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Listed <?php echo $title; ?></h5>
                                 <p align="right"> <input type="text" size="30" placeholder="search"  onkeyup="showCustomertable(this.value)"></p>
                                <div id="customertable">
                                </div>
                                <div id="alldatatable">
                                 <?php
	 $tag= $_GET['s'];
	 $id= $_GET['id'];
	 //echo $id;
	 
   if(isset($id) && $tag==4)
    {
        $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
        }
      $sql = "DELETE FROM ".$tablename." WHERE id=$id";
      if ($conn->query($sql) === TRUE) {
       //echo "Record deleted successfully";
          } else {
         echo "Error deleting record: " . $conn->error;
           }

		}
   
    if($tag=="1")
    {
          
          echo "<div class=\"alert alert-success\" role=\"alert\">".$title." added successfully</div>";
    }
    if($tag=="2")
    {
                    echo "<div class=\"alert alert-success\" role=\"alert\">".$title." edited successfully</div>";
    }
    if($tag=="4")
    {
                    echo "<div class=\"alert alert-success\" role=\"alert\">".$title." Deleted successfully</div>";
    }
   
    ?>
   <?php
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                           }
                           
                              //--------------------------------------------------------------------------
    $results_per_page = $rcus;
    if($tag=="5")
    {
      $query = "select *from ".$tablename." WHERE name LIKE '%$search%'";  
       // $search
    }else{
      $query = "select *from ".$tablename;  
    }
   
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  
      $number_of_page = ceil ($number_of_result / $results_per_page);  
      if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    } 
    $page_first_result = ($page-1) * $results_per_page;
    
      $query = "SELECT *FROM ".$tablename." order by id DESC LIMIT "  . $page_first_result . ',' . $results_per_page;
    
       
    $result = mysqli_query($conn, $query);
    $no=$page_first_result++;
    $no++;
         
                           if ($result->num_rows > 0) {
                            ?>
                                   <table class="table">
                                       <thead>
                                         <tr>
                              <th>S.No</th>
                              <th>Company Name</th>
					                         <th>Contact No</th>
					                         <th>Email</th>
                              <th>Edit</th>
                             <!-- <th>Delete</th> -->
                               </tr>
                                       </thead> 
                                         <tbody>
                                        <?php
                           while($row = $result->fetch_assoc()) {
                             echo "<tr><td>". $no. "</td>";
                             echo "<td><a href=View".$title.".php?id=". $row["id"]. ">". $row["fd1"]. "</a></td>";
							echo "<td>". $row["fd5"]. "</td>";
							 echo "<td>". $row["fd6"]. "</td>";
            				 echo "<td><a href=Edit".$title.".php?id=". $row["id"]. "&page=$page>Edit</a></td>";
					 //echo "<td><a href=# onclick=\"deleteFormItem(".$row["id"].")\">Delete</a></td></tr>";
         
                             $no++;
                             }
                             } else {
                             echo "No ".$title." in Database";
                              }
       //------------------------------------------------------------------
  //   echo "</table><br><p align=left>Page:&nbsp;";
  //  for($page = 1; $page<= $number_of_page; $page++) {  
  //      echo '<a href = "List'.$title.'.php?s=0&page=' . $page . '">' . $page . ' </a>&nbsp;&nbsp;';  
   // }
    echo "</p>";
    //------------------------------------------------------------------                       
           $conn->close();
                         ?>
                                             </tbody>
                                        
                                    </table>
                               
                            
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
    