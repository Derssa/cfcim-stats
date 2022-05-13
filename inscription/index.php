<?php
session_start();
if(!isset($_SESSION['MyCFCIM_id'])){
    $err="";
    if($_POST){
        include '../php/db.php';   
        $prenom=$_POST['prenom']; 
        $nom=$_POST['nom'];     
        $email=$_POST['email'];
        $password=$_POST['password'];  
        $cf_password=$_POST['cf_password'];
        if($password!=$cf_password){
          $err="Mots de passe ne sont pas les mêmes"; 
        }else{
          $sql = "SELECT email FROM users WHERE email=$email";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {            
            $err="Ce email exist déjà";             
          } else {
            $passwordR=password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (prenom, nom, email,password)
            VALUES (\"$prenom\", \"$nom\", \"$email\",\"$passwordR\")";

            if ($conn->query($sql) === TRUE) {
              header('location:../activationMessage.php?msg=Merci d\'incrire sur MyCFCIM STATS, on va vous envoyez un email une fois votre compte est activé');
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
          
        }
    }
}else{
    header('location:../home');      
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../public/icon.png">
    <link rel="stylesheet" href="../css/wave.css" />
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/first.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <title>MyCFCIM Stats</title>
  </head>
  <body>
    <div class="waveWrapper waveAnimation">
      <div class="waveWrapperInner bgTop">
        <div
          class="wave waveTop"
          style="
            background-image: url('../public/wave-top.png');
          "
        ></div>
      </div>
      <div class="waveWrapperInner bgMiddle">
        <div
          class="wave waveMiddle"
          style="
            background-image: url('../public/wave-mid.png');
          "
        ></div>
      </div>
      <div class="waveWrapperInner bgBottom">
        <div
          class="wave waveBottom"
          style="
            background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png');
          "
        ></div>
      </div>
    </div>
    <div class="app">
      <div class="header">
        <img src="../public/logo.png" alt="logo" width="300" />
      </div>
      <div class="body">
        <h2>INSCRIVEZ-VOUS</h2>
        <form method="POST">
        <input
            type="text"
            name="prenom"
            id="prenom"
            placeholder="Prenom"
            required
          />
          <input
            type="text"
            name="nom"
            id="nom"
            placeholder="Nom"
            required
          />
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Email"
            required
          />
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Mot de passe"
            required
          />
          <input
            type="password"
            name="cf_password"
            id="cf_password"
            placeholder="Confimez mot de passe"
            required
          />
          <button type="submit">INSCRIVEZ</button>
          <span>*Vous avez déjà un compte CFCIM?<a href="../"> connectez-vous</a></span> 
          <span style="color:#e98001;font-weight:500;margin-top:2px;"><?php echo $err?></span>         
        </form>        
      </div>
    </div>
  </body>
</html>
