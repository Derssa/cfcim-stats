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
                echo $result->num_rows;
                $conn->close();
?>