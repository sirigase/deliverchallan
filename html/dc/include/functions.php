 <?php
     //variable inititalisation
    include 'include/db.php';
    //include 'include/db2.php';  
      
  // to retieve values into Settings table
    $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM settings WHERE id=1";
                         $result = $conn->query($sql);
                           if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) {
                               $assessmentYear=$row["fd1"];
    $recordsToShow=$row["fd2"];
    $rcus=$recordsToShow;
   
	}
                             } else {
                             echo "0 results";
                              }
                     $conn->close();

                     function test_input($data) {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = htmlspecialchars($data);
                      return $data;
                    }
                         ?>