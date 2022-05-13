<?php
session_start();
    if(!$_SESSION['admin_mycfcim_stats']){
        header('location:../admin');      
    }
    include '../php/db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../public/icon.png" />
    <link rel="stylesheet" href="../css/wave.css" />
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/first.css" />
    <link rel="stylesheet" href="../css/entreprise.css" />
    <title>MyCFCIM Stats</title>
  </head>
  <body>
    <div class="waveWrapper waveAnimation">
      <div class="waveWrapperInner bgTop">
        <div
          class="wave waveTop"
          style="background-image: url('../public/wave-top.png')"
        ></div>
      </div>
      <div class="waveWrapperInner bgMiddle">
        <div
          class="wave waveMiddle"
          style="background-image: url('../public/wave-mid.png')"
        ></div>
      </div>
      <div class="waveWrapperInner bgBottom">
        <div
          class="wave waveBottom"
          style="background-image: url('../public/wave-bot.png')"
        ></div>
      </div>
    </div>
    <div class="app">
      <div class="header">
        <img src="../public/logo.png" alt="logo" width="300" />
      </div>
      <h2>ADMIN</h2>
      <div class="subMenuAdmin">
          <a href="./index.php">Ajouter Stats</a>
          <a href="./comptes.php">Comptes</a>
          <a style="color: #0c4377" href="#">entreprises</a>
          <a style="color: #e40343" href="./logout.php">Deconnexion</a>
      </div>  
      <div class="entreprises">
        <a style="color: #fff;background-color:#0c4377;padding:10px;font-weight:500;box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.4);" href="./addCompany.php">Ajouter Entreprise</a>
        <div class="entreprises_list">
            <?php
            $sql = "SELECT * FROM companies";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo '<div class="entreprise">
                <span style="color: #000;font-weight:500;">'.$row['name'].'</span>
                <a style="color: #000;background-color:#ebe54b;padding:5px 10px;font-weight:500;box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.3);border-radius:5px" href="./modifieCompany.php?id='.$row['internal_id'].'&nom='.$row['name'].'&seller='.$row['seller'].'">Modifier</a>
            </div>';
              }
            } else {
              echo '<span style="color: #e98001;font-weight:500;">PAS D\'ENTREPRISES</span>';
            }
            $conn->close();
            ?>            
        </div>
      </div>        
    </div>
  </body>
</html>