<?php
session_start();
if(!$_SESSION['admin_mycfcim_stats']){
    header('location:../admin');      
}
include "../php/db.php";
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadSheet = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
if($_POST){            
    if(isset($_FILES['connexions'])){
        if($spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(0)->getCell('C5')->getValue()=="Nombre d'utilisateurs actifs"){
            $active_users=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(0)->getCell('D5')->getValue();
            $pc=substr($spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(1)->getCell('D4')->getValue(), 0, strpos($spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(1)->getCell('D4')->getValue(), ' '));
            $ios=substr($spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(1)->getCell('D5')->getValue(), 0, strpos($spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(1)->getCell('D5')->getValue(), ' '));
            $android=substr($spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(1)->getCell('D6')->getValue(), 0, strpos($spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(1)->getCell('D6')->getValue(), ' '));
            $Evènements_ouverts=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D3')->getValue();
            $CFCIM_en_vidéo=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D4')->getValue();
            $Demandes_stages_emplois=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D5')->getValue();
            $BOUTIQUE_produits=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D6')->getValue();
            $ECOPARC_BERRECHID=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D7')->getValue();
            $MEDIATION=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D8')->getValue();
            $Séminaire_en_ligne=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D9')->getValue();
            $Evènements_passés=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D10')->getValue();
            $Village_partenaires=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D11')->getValue();
            $Participants_networking=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D12')->getValue();
            $Revue_conjoncture=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D13')->getValue();
            $Team_France_Export=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D14')->getValue();
            $Evènements_venir=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D15')->getValue();
            $Guide_privilèges=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D16')->getValue();
            $Kluster_CFCIM=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(2)->getCell('D17')->getValue();
            $jour  = $_POST['connexions_date'];  
            $Demandes_contacts=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(3)->getCell('C4')->getValue();
            $rendez_vous=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(3)->getCell('C5')->getValue();
            $Nombre_messages=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(3)->getCell('C6')->getValue();
            $Nombre_appels_vidéos=$spreadSheet->load($_FILES['connexions']['tmp_name'])->getSheet(3)->getCell('C7')->getValue();
            $sqll = "SELECT * FROM connexions WHERE jour=STR_TO_DATE('$jour', '%Y-%m-%d')";
            $result = $conn->query($sqll);

            if ($result->num_rows > 0) {
                header('location:./?msg=Vous avez déjà inserer les donnés de '.$jour);    
            } else {
                $sql = "INSERT INTO connexions (active_users, pc, ios, android, Evenements_ouverts, CFCIM_en_video, Demandes_stages_emplois, BOUTIQUE_produits, ECOPARC_BERRECHID, MEDIATION, Seminaire_en_ligne, Evenements_passes, Village_partenaires, Participants_networking, Revue_conjoncture, Team_France_Export, Evenements_venir, Guide_privileges, Kluster_CFCIM, jour, Demandes_contacts, rendez_vous, Nombre_messages, Nombre_appels_videos) VALUES ($active_users, $pc, $ios, $android, $Evènements_ouverts, $CFCIM_en_vidéo, $Demandes_stages_emplois, $BOUTIQUE_produits, $ECOPARC_BERRECHID, $MEDIATION, $Séminaire_en_ligne, $Evènements_passés, $Village_partenaires, $Participants_networking, $Revue_conjoncture, $Team_France_Export, $Evènements_venir, $Guide_privilèges, $Kluster_CFCIM, STR_TO_DATE('$jour', '%Y-%m-%d'), $Demandes_contacts, $rendez_vous, $Nombre_messages, $Nombre_appels_vidéos)";

                if ($conn->query($sql) === TRUE) {
                    header('location:./?msg=Insertion fichier connexions réussi');  
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            
            

            $conn->close();
        }else{
            header('location:./?msg=Inserez un fichier excel de connexions valide'); 
        }
    }else {
        header('location:./?msg=selectionner un fichier excel de connexions');
    }
}
?>