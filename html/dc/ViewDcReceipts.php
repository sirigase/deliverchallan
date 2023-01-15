<?php include 'include/logincheck.php';?>
<?php include 'include/functions.php';?>
<?php
$myFile = "invoice.html"; 
$fh = fopen($myFile, 'w');  
 $tablename="alldcreceipts"; 
 $tablename2="challandetails"; 
  $title="DcReceipts";
 $tablename3="company";
 $tablename4="buyer"; 
?>
<?php
          $redirect= $_GET['x'];
          $id= $_GET['id'];
          $company=$_GET['cy'];
          $tag= $_GET['s'];
          $pageNo= $_GET['page'];
         $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                           }
                           $sql = "SELECT * FROM ".$tablename." WHERE fd1=$id AND fd2=$company"; // alldcreceipts
                         $result = $conn->query($sql);
                           if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) {
                           $fd1a=$row["fd1"]; //dc no
    $fd2a=$row["fd2"]; //company
    $fd3a=$row["fd3"]; // buyer
    $fd4a=$row["fd4"]; //total
    $fd5a=$row["fd5"];  //assyr
    $fd6a=$row["fd6"];  //purpose
    $fd7a=$row["fd7"];  //transport
    $fd8a=$row["fd8"]; //vehicle
    $fd9a=$row["fd9"]; //date
   
                               }
                             }
      // GET COMPANY DETAILS STARTS
       $sql = "SELECT * FROM ".$tablename3." WHERE id=$fd2a";
                         $result = $conn->query($sql);
                           if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) {
                           $fd1c=$row["fd1"];
    $fd2c=$row["fd2"];
    $fd3c=$row["fd3"];
    $fd5c=$row["fd5"];
    $fd6c=$row["fd6"];
    $fd7c=$row["fd7"];
    $fd8c=$row["fd8"];
    $fd9c=$row["fd9"];
         }
                           }
          // GET COMPANY DETAILS ENDS
          // get buyer details starts
          $sql = "SELECT * FROM ".$tablename4." WHERE id=$fd3a";
                         $result = $conn->query($sql);
                           if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) {
                           $fd1d=$row["fd1"];
    $fd2d=$row["fd2"];
    $fd3d=$row["fd3"];
    $fd4d=$row["fd4"];
    $fd5d=$row["fd5"];
    $fd6d=$row["fd6"];
    $fd7d=$row["fd7"];
    $fd8d=$row["fd8"];
    $fd9d=$row["fd9"];
    $fd10d=$row["fd10"];
    $fd11d=$row["fd11"];
    $fd12d=$row["fd12"];
     }
                             }
          
           // get buyer details ends
           //retrieve dchallan details starts
      $sql = "SELECT * FROM ".$tablename2." WHERE fd10=$id AND fd8=$company"; //challandetails
                         $result = $conn->query($sql);
                           if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) {
                           $fd1b=$row["fd1"]; //pat
    $fd2b=$row["fd2"]; //desc
  
    $fd4b=$row["fd4"]; //nos
    $fd5b=$row["fd5"]; //qreq
    $fd6b=$row["fd6"]; //amt
    $fd7b=$row["fd7"]; //total
    $fd8b=$row["fd8"]; //company
    $fd9b=$row["fd9"]; //buyer
    $fd10b=$row["fd10"]; //dc no
    $fd11b=$row["fd11"]; // date
    //fd12 amtu amt of product on that date
    $fd13b = $row["fd13"]; //hsn
    $fd14b = $row["fd14"]; // tax
                               }
                             }
              //retrieve dchallan details ends               
                     $conn->close();
         $newDate=explode('-',$fd9a);
                      $dateCorrect=$newDate[2]."-".$newDate[1]."-".$newDate[0];
                      $date=$dateCorrect;
        ?>
 <?php
 $temp1 = '
        <!DOCTYPE html>
    <html>

    <head>
        <title>Delivery Challan</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
           </head>

    <body>
        <div id="pdf_header">
            <table>
                <tr>
                    <td>DC No: '.$fd1a.'</td>
                    <td>Assessment Yr: '.$fd5a.'</td>
                </tr>
            </table>
        </div>
    </body>

    </html>
    ';
    
  $temp2 =  '
  <!DOCTYPE html>
    <html>

    <head>
        <title>Delivery Challan</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <style>
table.GeneratedTable {
  width: 100%;
  background-color: #ffffff;
  border-collapse: collapse;
  border-width: 2px;
  border-color: black;
  border-style: solid;
  color: #000000;
  font-size: 12px;
}

table.GeneratedTable td, table.GeneratedTable th {
  border-width: 2px;
  border-color: black;
  border-style: solid;
  height:5px;
  /* padding: 3px; */
}

table.GeneratedTable thead {
  background-color: #ffcc00;
}
</style>
    </head>

    <body>
<table class="GeneratedTable">
  
  <tbody>
  <tr>
   <td colspan="3" style="text-align:center;font-weight: bold;
    font-size: 20px;">DELIVERY CHALLAN</td>
  </tr>
    <tr>
      <td rowspan="9">SHIPPED FROM<br><b>'.$fd1c.'</b><br>
      '.$fd2c.'<br>FACTORY: '.$fd3c.'<br>
      Contact : '.$fd5c.'<br>
      Email : '.$fd6c.'<br>
      PAN : '.$fd9c.'<br>
      GST No : '.$fd7c.'<br>
      <div style="visibility: hidden;">madhansdsdsdsdsdsdsdsdsdsdsssssssssddddddsssssswww
      madhansdsdsdsdsdsdsdsdsdsdsssssssssdddd
      </div> 
      </td>
      <td style="width:100px;">DC No</td>
      <td style="height:10px;font-size: 15px;"><center><b>'.$fd1a.'</b></center></td>
    </tr>
    <tr>
     
      <td>Dated</td>
      <td style="width:10px;font-size: 15px;"><center><b>'.$date.'</b></center></td>
    </tr>
    <tr>
     
      <td>FY-YEAR</td>
      <td><center>'.$fd5a.'</center></td>
    </tr>
    <tr>
     <td>PAN No</td>
    <td><center>'.$fd9c.' </center></td>
  </tr>
   <tr>
     <td>Destination from</td>
      <td>COIMBATORE</td>
    </tr>
    <tr>
     <td>Destination To</td>
      <td>'.$fd3d.'</td>
    </tr>
    <tr>
     
      <td>Purpose</td>
      <td>'.$fd6a.'</td>
    </tr>
    <tr>
     
      <td>Transporters</td>
      <td>'.$fd7a.'</td>
    </tr>
    <tr>
     
      <td>Vehicle No</td>
      <td>'.$fd8a.'</td>
    </tr>
   <tr>
     <td rowspan="4">SHIPPED TO<br>
     <b> '.$fd1d .'</b> <br>
       '.$fd2d.'<br>
       Contact : '. $fd4d.'<br>
     '. $fd5d.'<br>
       
     </td>
      <td colspan="2">BUYERS GST DETAIL</td>
      
    </tr>
     <tr>
     
      <td>GSTIN/UIN</td>
      <td>'.$fd6d.'</td>
    </tr>
     <tr>
     
      <td>STATE</td>
      <td>'.$fd3d.'</td>
    </tr>
     <tr>
     
      <td>STATE CODE</td>
      <td>'.substr($fd6d,0,2).'</td>
    </tr> </tbody></table>';
 $temp2.='
 <table class="GeneratedTable">
   <tbody>
   <tr>
                 <td><center>SI NO</center></td>
                <td><center>PATTERN NO/CATALOGUE NO</center></td>
                <td><center>ITEM DESCRIPTION</center></td>
                <td><center>QUANTITY</center></td>
                <td><center>NOS,SET,KGS</center></td>
                <td><center>HSN/SAC</center></td>
                <td><center>GST RATE</center></td>
                <td><center>APPRX VALUE</center></td> 
          </tr>
 
 ';    
  $no=1;
  $flagNos=false;
                    $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                           }
                          $sql = "SELECT * FROM challandetails WHERE fd10=$id AND fd8=$company";
                         $result = $conn->query($sql);
                           if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                            $nos=$row["fd4"];
                            if($nos=="NOS"){
                              $flagNos=true;
                            }
                            if($flagNos){
                              $temp2.="<tr><td></td>";
                            }else{
                              $temp2.="<tr><td><center>".$no."</center></td>";
                              $no++;
                            }
                            
                             $temp2.="<td><center>".$row["fd1"]."</center></td>";
                             $temp2.="<td><center>".$row["fd2"]."</center></td>";
                             $temp2.="<td><center>".$row["fd5"]."</center></td>";
                             $temp2.="<td><center>".$row["fd4"]."</center></td>";
                             if($flagNos){
                              $temp2.="<td></td>";
                            }else{
                              $temp2.="<td><center>".$row["fd13"]."</center></td>";
                            }
                            if($flagNos){
                              $temp2.="<td></td>";
                            }else{
                              $temp2.="<td><center>".$row["fd14"]."</center></td>";
                            }
                            if($flagNos){
                              $temp2.="<td></td>";
                            }else{
                              $temp2.="<td><center>".$row["fd6"]."</center></td></tr>";
                            }
                            $flagNos=false;
                            
                             }

                             }

$temp2.='
            <tr>
             <td></td>
             <td colspan="4"><center>APPR VALUE IN RUPEES</center></td>
             <td></td>
             <td></td>
             <td><center>'.$fd7b.'</center></td>
            </tr>
             <tr>
             
             <td colspan="7"><center>LABOUR CHARGES ONLY/MACHINING/GRINDING/MOULDING PURPOSE</center></td>
             <td></td>
            </tr>
             <tr>
              <td colspan="8"><center>NOT FOR SALE -RETURNABLE BASIS</center></td>
              </tr>
             <tr>
              <td colspan="8"><center>We declare that this DC shows the actual of the goods described and that all particulars
              are true and correct.</center></td>
              </tr>
             <tr>
             <td colspan="3" style="height:100px;vertical-align:top;"><center>PREPARED BY</center></td>
             <td colspan="2" style="height:100px;vertical-align:top;"><center><b> RECEIVERS SIGN</b></center></td>
             <td colspan="3" style="height:100px;vertical-align:top;"><br><center> <b>FOR '.$fd1c.'</center>
                <br><br><br><br><br>
                      <center> <b>N.PREM<br>PARTNER  </b></center>
             </b></td>
            
            </tr>
             ';
  $temp2.='</tbody>
</table>
</body>

    </html>
';
fwrite($fh, $temp2);
fclose($fh);
//header('Location:ViewChallan.php?id='.$id.'&cy='.$company.'&s='.$tag);
?>
<?php
echo "<script type=\"text/javascript\">
        window.open('ViewChallan.php?id=".$id."&cy=".$company."&s=".$tag."', '_blank')
    </script>";

    ?>
 <script>
         setTimeout(function(){
           <?php  if($redirect==1) { ?>
            window.location.href = 'ListDcReceipts.php<?php echo "?page=".$pageNo."'"; ?>
            <?php 
           } else if($redirect==2) {
              ?>
            window.location.href = 'ListDcReceipts2.php<?php echo "?page=".$pageNo."'"; ?>;
            <?php }else{
              ?>
window.location.href = 'IssueDC.php';
              <?php } ?>
         }, 2000);
      </script>