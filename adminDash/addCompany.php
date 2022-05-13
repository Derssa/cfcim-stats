<?php
    session_start();
    if(!$_SESSION['admin_mycfcim_stats']){
        header('location:../admin');      
    }
    if($_POST){
        include '../php/db.php';        
        $nom=$_POST['nom'];
        $id=$_POST['id'];  
        $seller=$_POST['typeE'];        
        $sql="INSERT INTO companies (name,internal_id,seller)VALUES(\"$nom\",\"$id\",$seller)";
        if ($conn->query($sql) === TRUE) {
            header('location:./entreprises.php');
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close();  
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
          <a style="color: #0c4377" href="./entreprises.php">entreprises</a>
          <a style="color: #e40343" href="./logout.php">Deconnexion</a>
      </div>  
      <div style="margin:50px 0" class="body">
        <form method="POST">
          <input
            type="text"
            name="nom"
            id="nom"
            placeholder="Nom Entreprise"
            required
          />
          <input
            type="text"
            name="id"
            id="id"
            placeholder="ID Entreprise sur MyCFCIM"
            required
          />
          <select id="typeE" name="typeE" required>
            <option value="">Selectioner type d'entreprise</option>
            <option value="0">Partenaire</option>
            <option value="1">Vendeur</option>
          </select>
          <button style="background-color:#0c4377;color:#fff" type="submit">AJOUTER</button>          
        </form>       
    </div>
  </body>
</html>