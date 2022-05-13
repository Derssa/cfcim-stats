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
    if(isset($_FILES['vendeurs'])){
        $sheetCount = $spreadsheet->load($_FILES['vendeurs']['tmp_name'])->getSheetCount();
        $jour  = $_POST['vendeurs_date']; 

        $sql = "SELECT * FROM booth WHERE jour=STR_TO_DATE('$jour', '%Y-%m-%d')";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header('location:./?msg=Vous avez déja inserer les donnés de '.$jour);
        } else {
            for ($i = 0; $i < $sheetCount-1; $i++) {
                $sheet = $spreadsheet->load($_FILES['vendeurs']['tmp_name'])->getSheet($i);
                if($sheet->getTitle()=="Booth"){
                    echo "<h1>Booth</h1>"; 
                    $sheetData = $sheet->toArray();
                    for ($j = 0; $j < count($sheetData); $j++)  {
                        if($j>=3){
                            $Email= $sheetData[$j][1];
                            $First_name= $sheetData[$j][2];
                            $Last_name= $sheetData[$j][3];
                            $Job_title= $sheetData[$j][4];
                            $Company= $sheetData[$j][5];
                            $Mobile_phone= $sheetData[$j][7];
                            $Landline_phone= $sheetData[$j][8];
                            $City= $sheetData[$j][12];
                            $Country= $sheetData[$j][14];
                            $entreprise_Name= $sheetData[$j][31];
                            $Internal_id= $sheetData[$j][34];
                            $Views= $sheetData[$j][36];
                            
                            $sql = "INSERT INTO booth (email, First_name, Last_name, Job_title, Company, Mobile_phone, Landline_phone, City, Country, entreprise_Name, Internal_id,Views, jour) VALUES (\"$Email\", \"$First_name\", \"$Last_name\", \"$Job_title\", \"$Company\", \"$Mobile_phone\", \"$Landline_phone\", \"$City\", \"$Country\", \"$entreprise_Name\", \"$Internal_id\", \"$Views\", STR_TO_DATE('$jour', '%Y-%m-%d'))";
    
                            if ($conn->query($sql) === TRUE) {
                                echo "created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                                                     
                        }
                    }
                }else if($sheet->getTitle()=="Product"){
                    echo "<h1>Products</h1>"; 
                    $sheetData = $sheet->toArray();
                    for ($j = 0; $j < count($sheetData); $j++)  {
                        if($j>=3){
                            $Email= $sheetData[$j][1];
                            $First_name= $sheetData[$j][2];
                            $Last_name= $sheetData[$j][3];
                            $Job_title= $sheetData[$j][4];
                            $Company= $sheetData[$j][5];
                            $Mobile_phone= $sheetData[$j][7];
                            $Landline_phone= $sheetData[$j][8];
                            $City= $sheetData[$j][12];
                            $Country= $sheetData[$j][14];
                            $entreprise_Name= $sheetData[$j][31];
                            $Internal_id= $sheetData[$j][34];
                            $product_Name= $sheetData[$j][36];
                            $Views= $sheetData[$j][41];
                            
                            $sql = "INSERT INTO product (email, First_name, Last_name, Job_title, Company, Mobile_phone, Landline_phone, City, Country, entreprise_Name, Internal_id, product_Name,Views, jour) VALUES (\"$Email\", \"$First_name\", \"$Last_name\", \"$Job_title\", \"$Company\", \"$Mobile_phone\", \"$Landline_phone\", \"$City\", \"$Country\", \"$entreprise_Name\", \"$Internal_id\", \"$product_Name\", \"$Views\", STR_TO_DATE('$jour', '%Y-%m-%d'))";
    
                            if ($conn->query($sql) === TRUE) {
                                echo "created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    }
                }else if($sheet->getTitle()=="Document"){
                    echo "<h1>Document</h1>"; 
                    $sheetData = $sheet->toArray();
                    for ($j = 0; $j < count($sheetData); $j++)  {
                        if($j>=3){
                            $Email= $sheetData[$j][1];
                            $First_name= $sheetData[$j][2];
                            $Last_name= $sheetData[$j][3];
                            $Job_title= $sheetData[$j][4];
                            $Company= $sheetData[$j][5];
                            $Mobile_phone= $sheetData[$j][7];
                            $Landline_phone= $sheetData[$j][8];
                            $City= $sheetData[$j][12];
                            $Country= $sheetData[$j][14];
                            $entreprise_Name= $sheetData[$j][31];
                            $Internal_id= $sheetData[$j][34];
                            $document_Name= $sheetData[$j][36];
                            
                            $sql = "INSERT INTO document (email, First_name, Last_name, Job_title, Company, Mobile_phone, Landline_phone, City, Country, entreprise_Name, Internal_id, document_Name, jour) VALUES (\"$Email\", \"$First_name\", \"$Last_name\", \"$Job_title\", \"$Company\", \"$Mobile_phone\", \"$Landline_phone\", \"$City\", \"$Country\", \"$entreprise_Name\", \"$Internal_id\", \"$document_Name\", STR_TO_DATE('$jour', '%Y-%m-%d'))";
    
                            if ($conn->query($sql) === TRUE) {
                                echo "created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    }
                }else if($sheet->getTitle()=="Advertisement"){
                    echo "<h1>Advertisement</h1>"; 
                    $sheetData = $sheet->toArray();
                    for ($j = 0; $j < count($sheetData); $j++)  {
                        if($j>=3){
                            $Email= $sheetData[$j][1];
                            $First_name= $sheetData[$j][2];
                            $Last_name= $sheetData[$j][3];
                            $Job_title= $sheetData[$j][4];
                            $Company= $sheetData[$j][5];
                            $Mobile_phone= $sheetData[$j][7];
                            $Landline_phone= $sheetData[$j][8];
                            $City= $sheetData[$j][12];
                            $Country= $sheetData[$j][14];
                            $entreprise_Name= $sheetData[$j][31];
                            $Internal_id= $sheetData[$j][34];
                            $Views= $sheetData[$j][40];
                            
                            $sql = "INSERT INTO advertisement (email, First_name, Last_name, Job_title, Company, Mobile_phone, Landline_phone, City, Country, entreprise_Name, Internal_id, Views, jour) VALUES (\"$Email\", \"$First_name\", \"$Last_name\", \"$Job_title\", \"$Company\", \"$Mobile_phone\", \"$Landline_phone\", \"$City\", \"$Country\", \"$entreprise_Name\", \"$Internal_id\", \"$Views\", STR_TO_DATE('$jour', '%Y-%m-%d'))";
    
                            if ($conn->query($sql) === TRUE) {
                                echo "created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    }
                }else{
                    header('location:./?msg=Inserez un fichier excel de vendeurs et leads valide');
                    break;
                }
                
            }
            header('location:./?msg=Insertion fichier vendeurs et leads réussi');
        }
        
               
        $conn->close();
    }
}
?>