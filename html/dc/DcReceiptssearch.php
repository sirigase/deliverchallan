<?php include 'include/logincheck.php';?>
<?php include 'include/functions.php';?>

<?php
 $tablename="alldcreceipts"; 
 $tablename2="buyer";
 $title="DcReceipts"; //Calls
$q = $_GET['q'];
 $sql="SELECT * FROM ".$tablename." WHERE  fd2=2 AND fd10 LIKE '%$q%' limit 20";
    $conn = new mysqli($servername, $username, $password, $dbname);
       
    $result = mysqli_query($conn, $sql);
    $no=$page_first_result++;
    $no++;
           if ($result->num_rows > 0) {
                            ?>
                          <table class="table">
                                       <thead>
                                         <tr>
                              <th>DC no</th>
                              <th>Date</th>
					                         <th>Buyer</th>
					                         <th>Total</th>
                                <th>View</th>
                              <th>Edit</th>
                              <th>Delete</th> 
                               </tr>
                                       </thead> 
                                         <tbody>
                                        <?php
                           while($row = $result->fetch_assoc()) {
                             $buyer=$row["fd3"];
                             $query2 = "SELECT *FROM ".$tablename2." WHERE id=$buyer";
                             $result2 = mysqli_query($conn, $query2);
                             $row2 = $result2->fetch_assoc();
                          echo "<tr><td>". $row["fd1"]. "</td>";
							echo "<td>". $row["fd9"]. "</td>";
                            echo "<td>". $row["fd10"]. "</td>";
                             echo "<td>". $row["fd4"]. "</td>";
                               echo "<td><a href=View".$title.".php?id=". $row["fd1"]. "&cy=2&s=0>View</a></td>";
            				 echo "<td><a href=Edit".$title.".php?id=". $row["fd1"]. "&page=$page&cy=2&s=3>Edit</a></td>";
					 echo "<td><a href=# onclick=\"deleteFormItem(".$row["fd1"].",2)\">Delete</a></td></tr>";
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
                                  