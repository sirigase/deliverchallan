<?php include 'include/logincheck.php'; ?>
<?php include 'include/functions.php'; ?>
<?php
$tag = $_GET['s'];
$tablename4 = "buyer";
if ($tag == "2") {
  //echo "into tag 2<br>";
  $company = $_POST["company"];
  $Itemslist = $_POST["products"];
  $deleteId = $_POST["deleteid"];
  $allItems = $_POST["allItems"];
  $formcount = $_POST["formcount"];
  $dcno = $_POST["dcno"];
  $date = $_POST["date"];
  $assyr = $_POST["assyr"];
  $purpose = $_POST["purpose"];
  $transport = $_POST["transport"];
  $vehicleno = $_POST["vehicleno"];
  $buyer = $_POST["buyer"];
  $allFine = $_POST["allfine"];
  $delActive = 0;
  $total = 0;
  $conn = new mysqli($servername, $username, $password, $dbname);
  //echo "form count : ".$formcount."<br>";
  if ($formcount == "") {
    $combineAll = $Itemslist . ";" . $allItems;
    $eachPipeSplit = explode("|", $Itemslist);
    $total = $total + ($eachPipeSplit[2] * $eachPipeSplit[5]);
    // echo "Total -".$total;
  } else {
    for ($x = 1; $x <= $formcount; $x++) {
      //echo "for loop x-".$x."<br>";
      $patno = $_POST["patno$x"];
      $desc = $_POST["desc$x"];
      $hsn = $_POST["hsn$x"];
      $tax = $_POST["tax$x"];
      $nos = $_POST["nos$x"];
      $qreq = $_POST["qreq$x"];
      $amt = $_POST["amt$x"];
      $amtu = $_POST["amtu$x"];
      $del = $_POST["del$x"];
      if ($del == "y") {
        $delActive = 1;
        // $combineAll=$combineAll;
        // echo "#1#";
        //$total=$total-($qreq*$amtu);
      } else {

        $combineAll = $patno . "|" . $desc . "|" . $qreq . "|" . $nos .  "|" . $amt . "|" . $amtu ."|" . $hsn ."|" . $tax . ";" . $combineAll;
       // echo $combineAll;
       // die('hell');
        $total = $total + ($qreq * $amtu);
        if ($allFine == 1) {

          // 6 form values, total, buyer details, from company, +6 more

          $sql1 = "INSERT INTO challandetails(fd1,fd2,fd4,fd5,fd6,fd7,fd8,fd9,fd10,fd11,fd12,fd13,fd14) VALUES
  ('$patno','$desc','$nos','$qreq','$amt','$total','$company','$buyer','$dcno','$date','$amtu','$hsn','$tax')";
          // echo $sql1;
          if (!$conn->query($sql1)) {
            echo ("Error description: " . $conn->error);
          }
        }
      }
      //echo "Total - ".$total;
      //echo "#2#";
      // echo $combineAll."<br>";
    }


    if ($allFine == 1) {
      // new table insert dc no,company,buyer,total value - alldcreceipts
      //update total in buyer details
      // insert dc no into selected company
      $intoGendata = "1";
      if ($company == 2) {
        $sql = "INSERT INTO sashgenerate(data) VALUES ('$intoGendata')";
      } else {
        $sql = "INSERT INTO hindgenerate(data) VALUES ('$intoGendata')";
      }
      $conn->query($sql);
      // get buyer details starts
      $sql = "SELECT * FROM " . $tablename4 . " WHERE id=$buyer";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $fd1d = $row["fd1"];
        }
      }
      $sql2 = "INSERT INTO alldcreceipts(fd1,fd2,fd3,fd4,fd5,fd6,fd7,fd8,fd9,fd10) VALUES
  ('$dcno','$company','$buyer','$total','$assyr','$purpose','$transport','$vehicleno','$date','$fd1d')";
      // echo $sql1;
      if (!$conn->query($sql2)) {
        echo ("Error description: " . $conn->error);
      }
      header('Location:ViewDcReceipts.php?id=' . $dcno . '&cy=' . $company . '&s=1');
    }
    if ($delActive == 0) {

      $combineAll = $Itemslist . ";" . $combineAll;
      $eachPipeSplit = explode("|", $Itemslist);
      $total = $total + ($eachPipeSplit[2] * $eachPipeSplit[5]);
      //echo "#3#";
      // echo $combineAll."<br>";
    }
  }
  //echo "#4#";
  //echo $combineAll;
  $eachItemsplit = explode(";", $combineAll);
}

?>
<?php
//---------------------------------------------------------
$conn2 = new mysqli($servername, $username, $password, $dbname);
$sql2 = "SELECT invoiceno FROM sashgenerate";
$result2 = $conn2->query($sql2);
if ($result2->num_rows > 0) {
  while ($row2 = $result2->fetch_assoc()) {
    $sashLastid = $row2["invoiceno"];
  }
} else {
  //echo "0 results";
}
$sashLastid++;
$sql2 = "SELECT invoiceno FROM hindgenerate";
$result2 = $conn2->query($sql2);
if ($result2->num_rows > 0) {
  while ($row2 = $result2->fetch_assoc()) {
    $hindLastid = $row2["invoiceno"];
  }
} else {
  //echo "0 results";
}
$hindLastid++;
$conn2->close();
//-----------------------------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <?php include 'include/headerscripts.php'; ?>
  <![endif]-->

<script>
function loadCompanyProducts() {
 var str=parseInt(document.getElementById("company").value);
 if(str==2){
  document.getElementById("dcno").value=<?php echo $sashLastid; ?>;
 }
 if(str==3){
  document.getElementById("dcno").value=<?php echo $hindLastid; ?>;
 }
  if (str == "") {
	
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
    document.getElementById("newproducts").innerHTML = this.responseText;
				document.getElementById("oldproducts").innerHTML = "";
				}
    };
   xmlhttp.open("GET","DB_fetch.php?r=1&q="+str,true);
    xmlhttp.send();
  }
}
</script>
<script>
  function deleteFormItem(x) {
     document.getElementById("deleteid").value=x;
     document.getElementById("addItemsform").submit(); 
     // alert("Delte Item "+c);
    // alert("Item to be deleted "+x);
     
   }
     function validateFormItem()
   {
    if(isNaN(document.getElementById("dcno").value))
      {
           alert("Please Enter Valid DC Number ");
           document.getElementById("dcno").focus();
           return false;
      }
      
   }
</script>
<script>
 function amtDisplay(){
<?php
if ($tag == "2") {
  $formcount = count($eachItemsplit) - 1;
} else {
  $formcount = 1;
}
//echo "fc-".$formcount;
for ($x = 1; $x <= $formcount; $x++) {

  echo "document.getElementById(\"amt$x\").value=(document.getElementById(\"qreq$x\").value * document.getElementById(\"amtu$x\").value);";
}

echo "document.getElementById(\"total\").value=(";

for ($x = 1; $x <= $formcount; $x++) {

  if ($x == $formcount) {
    echo "parseInt(document.getElementById(\"amt$x\").value));";
  } else {
    echo "parseInt(document.getElementById(\"amt$x\").value)+";
  }
}


?>
  
 }
 


</script>
</head>

<body>
        <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php include 'include/preloader.php'; ?>
    <!-- ============================================================== -->
     <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
         <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <?php include 'include/topheader.php'; ?>
         <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'include/leftsidebar.php'; ?>
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
                        <h4 class="page-title">Delivery Challan</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DC</li>
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
                            <form class="form-horizontal" action="IssueDC.php?s=2" name="addItemsform" id="addItemsform" method="post">
                                <div class="card-body">
                                 <?php

                                  if ($tag == "2" || $tag == "6" || $tag == "5") {

                                    // echo "<textarea name=allItems rows=20 cols=80 id=allItems value=\"\">".$combineAll."</textarea>";
                                    if (!$deleteId == "") {
                                      echo "<input type=hidden name=allItems id=allItems value=\"" . $eachnewItem . "\">";
                                    } else {
                                      echo "<input type=hidden name=allItems id=allItems value=\"" . $combineAll . "\">";
                                    }
                                    echo "<input type=hidden name=deleteid id=deleteid>";
                                    //echo "<br>";
                                    //echo "combineAll - ".$combineAll."<br>";

                                  }

                                  ?>
                     
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 text-end control-label col-form-label">Company :</label>
                                        <div class="col-sm-9">
                                        <select name="company" id="company" class="select2 form-select shadow-none"
                                            style="width: 100%; height:36px;" onchange="loadCompanyProducts();">
                                        
                                          
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM company";
if ($company == "") {
  $company = 2;
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($company == $row["id"]) {
      $fd1 = $row["fd1"];
      $fd2 = $row["fd2"];
      $fd3 = $row["fd3"];
      $fd5 = $row["fd5"];
      $fd6 = $row["fd6"];
      $fd7 = $row["fd7"];
    }
    if ($company == $row["id"]) {
      echo "<option value=\"" . $row["id"] . "\" selected>" . $row["fd1"] . "</option>";
    } else {
      echo "<option value=\"" . $row["id"] . "\">" . $row["fd1"] . "</option>";
    }
  }
}
$conn->close();
?>
                        
               </select>
                                        </div>
                                    </div>
                 <div class="form-group row">
                                        <label for="Buyer :"
                                            class="col-sm-3 text-end control-label col-form-label">Buyer :</label>
                                        <div class="col-sm-9">
                                        <select class="select2 form-select shadow-none"
                                            style="width: 100%; height:36px;" name="buyer" id="buyer">
                                         <option value="">Select</option>
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM buyer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($buyer == $row["id"]) {
      $fd1b = $row["fd1"];
      $fd2b = $row["fd2"];
      $fd3b = $row["fd3"];
      $fd4b = $row["fd4"];
      $fd5b = $row["fd5"];
      $fd6b = $row["fd6"];
    }
    if ($buyer == $row["id"]) {
      echo "<option value=\"" . $row["id"] . "\" selected>" . $row["fd1"] . "-" . $row["fd3"] . "</option>";
    } else {
      echo "<option value=\"" . $row["id"] . "\">" . $row["fd1"] . "-" . $row["fd3"] . "</option>";
    }
  }
} else {

  // echo "0 results";
}
$conn->close();
?>
                           </optgroup>
               </select>
                                        </div>
                                    </div>                   
                                    <div class="form-group row">
                                <label for=""
                                            class="col-sm-3 text-end control-label col-form-label">DC No : </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="dcno" id="dcno" value="<?php
                                                                                                                  if ($company == 2) {
                                                                                                                    echo $sashLastid;
                                                                                                                  } else {
                                                                                                                    echo $hindLastid;
                                                                                                                  }

                                                                                                                  ?>">
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 text-end control-label col-form-label">Date :</label>
                                        <div class="col-sm-9">
                                         
                                          <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d"); ?>">
                                             
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 text-end control-label col-form-label">Assessment Year :</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="assyr" value="<?php echo $assessmentYear; ?>">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 text-end control-label col-form-label">Purpose : </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="purpose" value="<?php echo $purpose; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 text-end control-label col-form-label">Transport :</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="transport" value="<?php echo $transport; ?>">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 text-end control-label col-form-label">Vehicle No :</label>
                                        <div class="col-sm-9">
                                           <input type="text" class="form-control" name="vehicleno" value="<?php echo $vehicleno; ?>">
                                         
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="Products :"
                                            class="col-sm-3 text-end control-label col-form-label">Products :</label>
                                         <div class="col-md-9">
                                            <div id="newproducts"></div>
<div id="oldproducts">
                                        <select name="products" class="select2 form-select shadow-none"
                                            style="width: 100%; height:36px;" id="products">
                                         
                                         
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM products WHERE fd1='$company'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    echo "<option value=\"" . $row["fd2"] . "|" . $row["fd3"] . "|" . $row["fd4"] . "|" . $row["fd5"] . "|"
     . $row["fd6"] . "|" . $row["fd6"] ."|" . $row["fd8"] ."|" . $row["fd9"] . "\">" . $row["fd2"] . "-" . $row["fd3"] . "</option>";
  }
}

?>
                         
               </select>
               <?php
                                    if (isset($fd1b) && ($formcount >= 1)) {
                                    ?>
                                    <input type="checkbox" class="form-check-input" id="allfine" value="1" name="allfine"> &nbsp;&nbsp;&nbsp;Submit Form
                                   <?php
                                    }
                                    ?>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                      <div class="card-body">
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                      </div>  
                                    
                                      
                               
                           <!-- </form> -->
                        </div>    
                                </div>
                        </div>
               
                  <!-- added -->
                <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">From</h5>
                                <p>
                                <b><?php echo "$fd1"; ?></b> <br>
                                <?php echo "$fd2"; ?> <br>
                                FACTORY &nbsp; :&nbsp;<?php echo "$fd3"; ?> <br>
                                Contact&nbsp;:&nbsp;<?php echo "$fd5"; ?> <br>
                                Email&nbsp;:&nbsp;<?php echo "$fd6"; ?> <br>
                                GSTIN&nbsp;:&nbsp;<?php echo "$fd7"; ?> <br>
                                </p>
                            
                    <?php if (isset($fd1b)) {
                    ?>
               
                                <h5 class="card-title">To</h5>
                                <p>
                                 <b><?php echo "$fd1b"; ?></b> <br>
                               
                                Address &nbsp; :&nbsp;<?php echo "$fd2b"; ?> <br>
                                State&nbsp; :&nbsp;<?php echo "$fd3b"; ?> <br>
                                Contact&nbsp;:&nbsp;<?php echo "$fd4b"; ?> <br>
                                Email&nbsp;:&nbsp;<?php echo "$fd5b"; ?> <br>
                                GST NO&nbsp;:&nbsp;<?php echo "$fd6b"; ?> <br>
                                State Code&nbsp;:&nbsp;<?php echo substr($fd6b, 0, 2); ?> <br>
                                </p>
                            
                    <?php
                    }
                    ?>
                    </div>
                        </div>
                    </div>
                </div>
               
             
                   
        <!-- added ends -->
        <?php


?><input type="hidden" name="formcount" id="formcount" value="<?php
                                                              if ($tag == "2" || $tag == "3") {
                                                                echo count($eachItemsplit) - 1;
                                                              } else {
                                                                //  echo "0";
                                                              }

                                                              ?>">
<?php if ($tag == "2" || $tag == "3") {
if ((count($eachItemsplit)) > 0) {
?>
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title"></h5>
             
<table class="table">
<thead>
 <tr>
<th>S.No</th>
<th>Pattern No/Catalogue No</th>
<th>Item Description</th>
<!-- <th>Quantity</th> -->
<th>Qty Require</th>
<th>Nos/Kgs/Set</th>
<th>HSN/SAC</th>
<th>GST Rate</th>
<th>Amount</th>
<th>Delete</th> 
</tr>
</thead>    
<?php
$no = 1;
$gross = 0;
$flagNos = false;

//echo "eachItemsplit - ".count($eachItemsplit);
//$separateItems=explode("|",$eachItemsplit);
// print_r($separateItems);
// die ('ha ha');
for ($i = count($eachItemsplit) - 2; $i >= 0; $i--) {
$separateItems = explode("|", $eachItemsplit[$i]);
//echo "<br>separateItemsCount - ".count($separateItems);
// print_r ($separateItems);
$nos = $separateItems[3];
if ($nos == "NOS") {
$flagNos = true;
}

// print_r ($separateItems);
if ($flagNos) {
echo "<tr><td></td>";
} else {
echo "<tr><td>" . $no . "</td>";
}

if ($flagNos) {
echo "<td><input type=\"hidden\" class=\"form-control\" name=\"patno" . $no . "\" id=\"patno" . $no . "\" value=\"" . $separateItems[0] . "\"></td>";
} else {
echo "<td><input type=\"text\" class=\"form-control\" name=\"patno" . $no . "\" id=\"patno" . $no . "\" value=\"" . $separateItems[0] . "\"></td>"; //Pattern No

}

echo "<td><input type=\"text\" class=\"form-control\" name=\"desc" . $no . "\" id=\"desc" . $no . "\"  value=\"" . $separateItems[1] . "\"></td>"; //Item Description


  echo "<td><input type=\"text\" class=\"form-control\" name=\"qreq" . $no . "\" id=\"qreq" . $no . "\" onchange=\"amtDisplay()\" value=\"" . $separateItems[2] . "\"></td>";  // Qty Require
  
echo "<td><input type=\"text\" class=\"form-control\" name=\"nos" . $no . "\" id=\"nos" . $no . "\"  value=\"" . $separateItems[3] . "\"></td>"; //Nos
if ($flagNos) {
  echo "<td><input type=\"hidden\" class=\"form-control\" name=\"hsn" . $no . "\" id=\"hsn" . $no . "\"  value=\"" . $separateItems[6] . "\"></td>";  // hsn
  } else {
  echo "<td><input type=\"text\" class=\"form-control\" name=\"hsn" . $no . "\" id=\"hsn" . $no . "\" value=\"" . $separateItems[6] . "\"></td>";  // hsn
  }
  if ($flagNos) {
    echo "<td><input type=\"hidden\" class=\"form-control\" name=\"tax" . $no . "\" id=\"tax" . $no . "\"  value=\"" . $separateItems[7] . "\"></td>";  // tax
    } else {
    echo "<td><input type=\"text\" class=\"form-control\" name=\"tax" . $no . "\" id=\"tax" . $no . "\" value=\"" . $separateItems[7] . "\"></td>";  // tax
    }
if ($flagNos) {
echo "<td><input type=\"hidden\" class=\"form-control\" name=\"amt" . $no . "\" id=\"amt" . $no . "\" value=\"" . $separateItems[4] . "\"></td>";  // Amount
} else {
echo "<td><input type=\"text\" class=\"form-control\" name=\"amt" . $no . "\" id=\"amt" . $no . "\" value=\"" . $separateItems[4] . "\"></td>";  // Amount
}

echo "<input type=\"hidden\" class=\"form-control\" name=\"amtu" . $no . "\" id=\"amtu" . $no . "\"  value=\"" . $separateItems[5] . "\">";  // Amount
// echo "<td><a onclick=\"deleteFormItem(".$no.")\"><img src=images/delete.ico width=15 height=15></a></td></tr>";
echo "<td><input class=\"form-check-input\" type=\"checkbox\" id=\"del" . $no . "\" name=\"del" . $no . "\" value=\"y\"></td></tr>";



$flagNos = false;
$no++;
}
echo "</table>";
}

?> <div class="form-group row">
                      <label for="fname"
                          class="col-sm-3 text-end control-label col-form-label">
                      
                       Appr Value in Rupees :</label>
                          <div class="col-sm-3">
                          <input type="text" class="form-control" id="total" name="total" value="<?php echo $total; ?>" size="4" placeholder="Total" readonly>
                          </form>
                        </div>
        </div>                  
          </div>
      </div>
  </div>

</div>
<?php
}
?>             
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                 </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
             <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'include/footer.php'; ?>
            
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
    <?php include 'include/js.php'; ?>
    <?php if ($tag == "2" || $tag == "3") { ?>
    <script>
window.scrollTo(0,document.body.scrollHeight);
</script>
<?php } ?>
    </body>

</html>
    