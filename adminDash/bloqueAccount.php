<?php
session_start();
if(!$_SESSION['admin_mycfcim_stats']){
    header('location:../admin');      
}
include '../php/db.php';
$id=$_GET['id']; 
$sql = "UPDATE users SET type=1 WHERE id=\"$id\"";

if ($conn->query($sql) === TRUE) {
    header('location:./cBloquer.php');
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close(); 
?>