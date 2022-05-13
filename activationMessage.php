<?php
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
}else{
    header('location:./');
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
        <h3 style="color:#ebe54b;text-shadow: 2px 2px 4px #00000059;"><?php echo $msg?></h3> 
        <a style="color:#fff;background-color:#0c4377;margin-top:40px;padding:10px;border-radius:10px;font-weight:500;box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.3);" href="./">Retouner</a>      
      </div>
    </div>
  </body>
</html>