<?php include 'include/logincheck.php';?>
<?php include 'include/functions.php';?>

<?php
 $tablename="products"; //calls
  $title="Products"; 
$q = $_GET['q'];
 $sql="SELECT * FROM ".$tablename." WHERE fd1='$q'";
    $conn = new mysqli($servername, $username, $password, $dbname);
       
    $result = mysqli_query($conn, $sql);
    $no=$page_first_result++;
    $no++;
           if ($result->num_rows > 0) {
                            ?>
                            <select name="products" id="products"  class="select2 form-select shadow-none"
                                            style="width: 100%; height:36px;">
                                          
                                        <?php
                           while($row = $result->fetch_assoc()) {
                            
                              echo "<option value=\"" . $row["fd2"] . "|" . $row["fd3"] . "|" . $row["fd4"] . "|" . $row["fd5"] . "|"
                              . $row["fd6"] . "|" . $row["fd6"] ."|" . $row["fd8"] ."|" . $row["fd9"] . "\">" . $row["fd2"] . "-" . $row["fd3"] . "</option>";
                           
                            
                             }
                             } else {
                             //echo "No ".$title." in Database";
                              }
                              
                              $conn->close();
                         ?>
                        
                                        
               </select>
                                  