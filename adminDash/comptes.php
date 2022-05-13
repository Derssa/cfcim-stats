<?php
session_start();
    if(!$_SESSION['admin_mycfcim_stats']){
        header('location:../admin');      
    }
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
    <link rel="stylesheet" href="../css/compte.css" />
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
          <a style="color: #0c4377" href="#">Comptes</a>
          <a href="./entreprises.php">entreprises</a>
          <a style="color: #e40343" href="./logout.php">Deconnexion</a>
      </div>   
      <div class="comptes">
          <div>
            <a style="color: #000;background-color:#ebe54b;padding:5px 10px;font-weight:500;box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.3);border-radius:5px;margin:0 5px;" href="#">Compte pas activé</a>
            <a style="color: #ebe54b;background-color:#2e2e2e;padding:5px 10px;font-weight:500;box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.3);border-radius:5px;margin:0 5px;" href="./cActiver.php">Compte activé</a>
            <a style="color: #ebe54b;background-color:#2e2e2e;padding:5px 10px;font-weight:500;box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.3);border-radius:5px;margin:0 5px;" href="./cbloquer.php">Compte bloqué</a>
          </div>
          <div class="list_comptes">
          <?php
            include '../php/db.php'; 
            $sql = "SELECT id,email FROM users WHERE type=0";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo '<div class="compte">
                  <span style="color: #000;font-weight:500;">'.$row["email"].'</span>
                  <div>
                      <a style="color: #fff;background-color:#0c4377;padding:5px 10px;font-weight:500;box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.3);border-radius:5px;margin:0 10px;" href="./modifyAccount.php?id='.$row["id"].'">Activer</a>
                      <a style="color: #fff;background-color:#e40343;padding:5px 10px;font-weight:500;box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.3);border-radius:5px;" href="./bloqueAccount.php?id='.$row["id"].'">Bloquer</a>
                  </div>
              </div>';
              }
            } else {
                echo '<span style="color: #e98001;font-weight:500;">PAS DE COMPTES</span>';
            }
            $conn->close();
            ?>         
            
          </div>
      </div>   
    </div>
  </body>
</html>