<?php

session_start();
    if(!$_SESSION['MyCFCIM_id']){
        header('location:../');      
    }
          include "../php/db.php";          
          if(isset($_GET)){
              $actifLabel=[];
              $actifData=[];
              $pcData=[];
              $iosData=[];
              $androidData=[];
              $EOData=[];
              $cfcimvData=[];
              $DSEData=[];
              $BPData=[];
              $EBData=[];
              $MData=[];
              $SLData=[];
              $EPData=[];
              $VPData=[];
              $PNData=[];
              $RCData=[];
              $TFEData=[];
              $EVData=[];
              $GPData=[];
              $KData=[];
              $DCData=[];
              $RVData=[];
              $NMData=[];
              $NAVData=[];
              $totalActif=0;
              $totalPc=0;
              $totalIos=0;
              $totalAndroid=0;
              $totalDC=0;
              $totalRV=0;
              $totalNM=0;
              $totalNAV=0;

              $startDate=$_GET["startDate"];
              $endDate=$_GET["endDate"];

              $sql = "SELECT * FROM connexions WHERE jour BETWEEN STR_TO_DATE('$startDate', '%Y-%m-%d') AND STR_TO_DATE('$endDate', '%Y-%m-%d') ORDER BY jour DESC ";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $totalActif+=$row["active_users"];
                  $totalPc+=$row["pc"];
                  $totalIos+=$row["ios"];
                  $totalAndroid+=$row["android"];
                  $totalDC+=$row["Demandes_contacts"];
                  $totalRV+=$row["rendez_vous"];
                  $totalNM+=$row["Nombre_messages"];
                  $totalNAV+=$row["Nombre_appels_videos"];
                  array_unshift($actifLabel,$row["jour"]);
                  array_unshift($actifData,$row["active_users"]);
                  array_unshift($pcData,$row["pc"]);
                  array_unshift($iosData,$row["ios"]);
                  array_unshift($androidData,$row["android"]);
                  array_unshift($EOData,$row["Evenements_ouverts"]);
                  array_unshift($cfcimvData,$row["CFCIM_en_video"]);
                  array_unshift($DSEData,$row["Demandes_stages_emplois"]);
                  array_unshift($BPData,$row["BOUTIQUE_produits"]);
                  array_unshift($EBData,$row["ECOPARC_BERRECHID"]);
                  array_unshift($MData,$row["MEDIATION"]);
                  array_unshift($SLData,$row["Seminaire_en_ligne"]);
                  array_unshift($EPData,$row["Evenements_passes"]);
                  array_unshift($VPData,$row["Village_partenaires"]);
                  array_unshift($PNData,$row["Participants_networking"]);
                  array_unshift($RCData,$row["Revue_conjoncture"]);
                  array_unshift($TFEData,$row["Team_France_Export"]);
                  array_unshift($EVData,$row["Evenements_venir"]);
                  array_unshift($GPData,$row["Guide_privileges"]);
                  array_unshift($KData,$row["Kluster_CFCIM"]);
                  array_unshift($DCData,$row["Demandes_contacts"]);
                  array_unshift($RVData,$row["rendez_vous"]);
                  array_unshift($NMData,$row["Nombre_messages"]);
                  array_unshift($NAVData,$row["Nombre_appels_videos"]);             
                }
              }              
              $conn->close();
              $arr = array('actifLabel'=>$actifLabel,'actifData' => $actifData,'pcData'=>$pcData,'iosData'=>$iosData,'androidData'=>$androidData,'EOData'=>$EOData,'cfcimvData'=>$cfcimvData,'DSEData'=>$DSEData,'BPData'=>$BPData,'EBData'=>$EBData,'MData'=>$MData,'SLData'=>$SLData,'EPData'=>$EPData,'VPData'=>$VPData,'PNData'=>$PNData,'RCData'=>$RCData,'TFEData'=>$TFEData,'EVData'=>$EVData,'GPData'=>$GPData,'KData'=>$KData,'DCData'=>$DCData,'RVData'=>$RVData,'NMData'=>$NMData,'NAVData'=>$NAVData,'totalActif'=>$totalActif,'totalPc'=>$totalPc,'totalIos'=>$totalIos,'totalAndroid'=>$totalAndroid,'totalDC'=>$totalDC,'totalRV'=>$totalRV,'totalNM'=>$totalNM,'totalNAV'=>$totalNAV);
              echo json_encode($arr);
          }  
?>