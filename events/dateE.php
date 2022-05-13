<?php
session_start();
    if(!$_SESSION['MyCFCIM_id']){
        header('location:../');      
    }
?>
<?php
                include '../php/db.php';
                $jour=$_GET['date'];
                $sql = "SELECT * FROM events_viewers WHERE jour=STR_TO_DATE('$jour', '%Y-%m-%d')";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>".$row['eventName']."</td>
                    <td>".$row['firstname']." ".$row['lastname']."</td>
                  </tr>";
                  }
                } else {
                  echo "<tr>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                  </tr>";
                }
                $conn->close();
?>