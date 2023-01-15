<?php include 'include/logincheck.php';?>
<?php include 'include/functions.php';?>

<?php
 $tablename="products"; //calls
  $title="Products"; 
$q = $_GET['q'];
 $sql="SELECT * FROM ".$tablename." WHERE fd1=3 AND fd3 LIKE '%$q%' limit 20";
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
                              <th>Pattern No</th>
					                         <th>Description</th>
					                         <th>Amount</th>
                                             <th>Company</th>
                              <th>Edit</th>
                              <th>Delete</th> 
                               </tr>
                                       </thead> 
                                         <tbody>
                                        <?php
                           while($row = $result->fetch_assoc()) {
                             echo "<tr><td>". $no. "</td>";
                             echo "<td><a href=View".$title.".php?id=". $row["id"]. ">". $row["fd2"]. "</a></td>";
							echo "<td>". $row["fd3"]. "</td>";
							 echo "<td>". $row["fd6"]. "</td>";
                             if($row["fd1"]==2)
               {
                echo "<td><button type=\"button\" class=\"btn btn-danger btn-sm text-white\">Shashwat</button></td>";
               }
               else{
                echo "<td><button type=\"button\" class=\"btn btn-success btn-sm text-white\">Hindtex</button></td>";
               }
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
                                  