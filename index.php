<?php
session_start();
if(!isset($_SESSION['MyCFCIM_id'])){
    $err="";
    if($_POST){
        include './php/db.php';        
        $email=$_POST['email'];
        $password=$_POST['password'];        
        $query="SELECT * FROM users WHERE email='$email'";
        $result=mysqli_query($conn,$query);
        if ($result->num_rows == 1) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            if (password_verify($password, $row["password"])) {
              if($row["type"]==0){
                header('location:./activationMessage.php?msg=Merci de bien vouloir patienter, on va vous envoyez un email une fois votre compte est activé');
              }else if($row["type"]==1){
                header('location:./activationMessage.php?msg=Votre compte est bloqué');
              }else{
                session_start();
                $_SESSION['MyCFCIM_id']= array('cfcim' => $row["internal_id"], 'id' => $row["id"]);
                header('location:./home');
              }
                
            } else {
                $err="Mot de passe incorrect";    
            } 
        }             
        }else{  
            $err="Email incorrect";        
        }
    }
}else{
    header('location:./home');      
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="public/icon.png" />
    <link rel="stylesheet" href="css/wave.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/first.css" />
    <title>MyCFCIM Stats</title>
  </head>
  <body>
    <div class="waveWrapper waveAnimation">
      <div class="waveWrapperInner bgTop">
        <div
          class="wave waveTop"
          style="background-image: url('./public/wave-top.png')"
        ></div>
      </div>
      <div class="waveWrapperInner bgMiddle">
        <div
          class="wave waveMiddle"
          style="background-image: url('./public/wave-mid.png')"
        ></div>
      </div>
      <div class="waveWrapperInner bgBottom">
        <div
          class="wave waveBottom"
          style="background-image: url('./public/wave-bot.png')"
        ></div>
      </div>
    </div>
    <div class="app">
      <div class="header">
        <img src="public/logo.png" alt="logo" width="300" />
      </div>
      <div class="body">
        <h2>CONNECTEZ-VOUS</h2>
        <form method="POST">
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
          <button type="submit">CONNECTEZ</button>
          <span
            >*Vous n'avez pas un compte CFCIM?<a href="./inscription">
              inscrivez-vous</a
            ></span
          >
          <span style="color:#e98001;font-weight:500;margin-top:2px;"><?php echo $err?></span>
        </form>
      </div>
    </div>
  </body>
</html>
