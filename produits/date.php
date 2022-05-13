<?php
session_start();
    if(!$_SESSION['MyCFCIM_id']){
        header('location:../');      
    }
?>
<?php
                include '../php/db.php';
                $type='';
                $id=$_SESSION['MyCFCIM_id']['id'];
                $mycfcim=$_SESSION['MyCFCIM_id']['cfcim'];
                $sql = "SELECT type FROM users WHERE id=$id";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $type=$row['type'];
                  }
                }
                if($type==4){
                  header('location:../entreprise');
                }
                $jour=$_GET['date'];
                if($type==2){
                  $sql = "SELECT * FROM product WHERE jour=STR_TO_DATE('$jour', '%Y-%m-%d')";
                  $result = $conn->query($sql);
                }else if($type>2){
                  $sql = "SELECT * FROM product WHERE jour=STR_TO_DATE('$jour', '%Y-%m-%d') AND internal_id='$mycfcim'";
                  $result = $conn->query($sql);
                }
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>".$row['product_Name']."</td>
                    <td>".$row['Views']."</td>
                    <td>".$row['First_name']." ".$row['Last_name']."</td>
                    </tr>
                    "; 
                  }
                } else {
                  echo "<tr>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                  </tr>";
                }
                $conn->close();
?>