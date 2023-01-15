<?php include 'include/logincheck.php';?>
<?php include 'include/functions.php';?>

<?php
 $tablename="buyer"; 
  $title="Buyer";
$q = $_GET['q'];
 $sql="SELECT * FROM ".$tablename." WHERE fd1 LIKE '%$q%' OR fd2 LIKE '%$q%' OR fd3 LIKE '%$q%' OR fd4 LIKE '%$q%' OR fd5 LIKE '%$q%'";
    $conn = new mysqli($servername, $username, $password, $dbname);
       
    $result = mysqli_query($conn, $sql);
    $no=$page_first_result++;
    $no++;
           if ($result->num_rows > 0) {
                            ?>
                           <table class="table">
                                       <thead>
                                         <tr>
                              <th>S.No</th>
                              <th>Name</th>
					                         <th>State</th>
					                         <th>Contact No</th>
                              <th>Edit</th>
                              <th>Delete</th> 
                               </tr>
                                       </thead> 
                                         <tbody>
                                        <?php
                           while($row = $result->fetch_assoc()) {
                             echo "<tr><td>". $no. "</td>";
                             echo "<td><a href=View".$title.".php?id=". $row["id"]. ">". $row["fd1"]. "</a></td>";
							echo "<td>". $row["fd3"]. "</td>";
							 echo "<td>". $row["fd4"]. "</td>";
            				 echo "<td><a href=Edit".$title.".php?id=". $row["id"]. "&page=$page>Edit</a></td>";
					 echo "<td><a href=# onclick=\"deleteFormItem(".$row["id"].")\">Delete</a></td></tr>";
         // echo "<td><a href=ListCall.php?s=4&id=". $row["id"]. ">Delete</a></td></tr>";
                             $no++;
                             }
                             } else {
                             echo "No ".$title." in Database";
                              }
                              
                              $conn->close();
                         ?>
                                             </tbody>
                                        
                                    </table>
                                  