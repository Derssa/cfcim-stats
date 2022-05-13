<?php
                session_start();
                if(!$_SESSION['MyCFCIM_id']){
                    header('location:../');      
                }
                include '../php/db.php';
                $type=$_GET['type'];
                if($type==""){
                    $sql = "SELECT * FROM events";
                }else if($type==1){
                    $sql = "SELECT * FROM events ORDER BY Title ASC";
                }else if($type==2){
                    $sql = "SELECT * FROM events ORDER BY Title DESC";
                }else if($type==3){
                    $sql = "SELECT * FROM events ORDER BY STR_TO_DATE(Start_date, '%m-%d-%y %l:%i %p') DESC";
                }else if($type==4){
                    $sql = "SELECT * FROM events ORDER BY STR_TO_DATE(Start_date, '%m-%d-%y %l:%i %p') ASC";
                }else if($type==5){
                    $sql = "SELECT * FROM events ORDER BY cast(Registered_attendees AS UNSIGNED) DESC";
                }else if($type==6){
                    $sql = "SELECT * FROM events ORDER BY cast(Registered_attendees AS UNSIGNED) ASC";
                }                
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>".$row['Title']."</td>
                    <td>".$row['Start_date']."</td>
                    <td>".$row['End_date']."</td>
                    <td>".$row['Location']."</td>
                    <td>".$row['Type']."</td>
                    <td>".$row['Registered_attendees']."</td>
                  </tr>";
                  }
                } else {
                    echo "<tr>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                  </tr>";
                }
                $conn->close();
?>