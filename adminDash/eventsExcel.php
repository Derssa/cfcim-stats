<?php

session_start();
    if(!$_SESSION['admin_mycfcim_stats']){
        header('location:../admin');      
    }
    
include "../php/db.php";
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
if($_POST){            
    if(isset($_FILES['events'])){
        $sheetCount = $spreadsheet->load($_FILES['events']['tmp_name'])->getSheetCount();
        $jour  = $_POST['events_date']; 
        $sql = "SELECT * FROM events_viewers WHERE jour=STR_TO_DATE('$jour', '%Y-%m-%d')";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header('location:./?msg=Vous avez déja inserer les donnés de '.$jour);
        } else {
            for ($i = 0; $i < $sheetCount-1; $i++) {
                $sheet = $spreadsheet->load($_FILES['events']['tmp_name'])->getSheet($i);
                if($sheet->getTitle()=="Sessions"){
                    echo "<h1>SESSIONS</h1>"; 
                    $sheetData = $sheet->toArray();
                    for ($j = 0; $j < count($sheetData); $j++)  {
                        if($j>=2){
                            $Title= strval($sheetData[$j][0]);
                            $Start_date= $sheetData[$j][1];
                            $End_date= $sheetData[$j][2];
                            $Format= $sheetData[$j][3];
                            $Type= $sheetData[$j][4];
                            $Location= $sheetData[$j][5];
                            $Topics= $sheetData[$j][6];
                            $Internal_id= $sheetData[$j][7];
                            $External_id= $sheetData[$j][8];
                            $Linked_exhibitors= $sheetData[$j][9];
                            $Registered_attendees= $sheetData[$j][10];
                            $Unique_viewer= $sheetData[$j][11];
                            $Average_watching= $sheetData[$j][12];
                            
                            $sql4 = "SELECT * FROM events WHERE Internal_id='$Internal_id'";
                            $result4 = $conn->query($sql4);
    
                            if ($result4->num_rows > 0) {
                                $sql = "SELECT * FROM events_viewers ORDER BY jour DESC LIMIT 1";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        if($jour>$row["jour"]){
                                            while($row = $result4->fetch_assoc()) {
                                                $sql5 = "UPDATE events SET Registered_attendees='$Registered_attendees' WHERE Internal_id='$Internal_id'";
                
                                                if ($conn->query($sql5) === TRUE) {
                                                    echo "Record updated successfully";
                                                  } else {
                                                    echo "Error updating record: " . $conn->error;
                                                  }
                                            }
                                        }
                                    }
                                }
                            } else {
                                $sql6 = "INSERT INTO events (Start_date, End_date, Format, Type, Location, Topics, Internal_id, External_id, Linked_exhibitors, Registered_attendees, Unique_viewer, Average_watching, Title) VALUES (\"$Start_date\", \"$End_date\", \"$Format\", \"$Type\", \"$Location\", \"$Topics\", \"$Internal_id\", \"$External_id\", \"$Linked_exhibitors\", \"$Registered_attendees\", \"$Unique_viewer\", \"$Average_watching\",\"$Title\")";
    
                                if ($conn->query($sql6) === TRUE) {
                                echo "old chart created successfully";
                                } else {
                                echo "Error: " . $sql6 . "<br>" . $conn->error;
                                }
                            }                         
                        }
                    }
                }else if($sheet->getTitle()=="Session viewer"){
                    echo "<h1>VIEWERS</h1>"; 
                    $sheetData = $sheet->toArray();
                    for ($j = 0; $j < count($sheetData); $j++)  {
                        if($j>=3){
                            $email= $sheetData[$j][11];
                            $firstName= $sheetData[$j][12];
                            $lastName= $sheetData[$j][13];
                            $company= $sheetData[$j][15];
                            $eventID= $sheetData[$j][7];
                            $accountID= $sheetData[$j][25]; 
                            $eventName= $sheetData[$j][0];                        
    
                            $sql = "INSERT INTO events_viewers (firstname, lastname, email, company, eventsID, jour, accountID,eventName) VALUES (\"$firstName\", \"$lastName\", \"$email\", \"$company\", \"$eventID\", STR_TO_DATE('$jour', '%Y-%m-%d'), \"$accountID\",\"$eventName\")";
    
                                if ($conn->query($sql) === TRUE) {
                                echo "viewers created successfully";
                                } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                        }
                    }
                }else{
                    header('location:./?msg=Inserez un fichier excel d\'événements valide');
                    break;
                }
                                
            }
            header('location:./?msg=Insertion fichier événements réussi');
        }
        
        $conn->close();
    }
}
?>