<?php
  session_start();
  if(isset($_SESSION["connectedA"])){header("location:dashboard.php");}
  if(isset($_POST['logout'])){
    session_destroy();
    header("location:login.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="../css/login.css">
  <script src="../js/plug/jQuery.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="top">
      <div class=""></div>
    </div>
    <h1>Administrateur</h1>
    <p>connectez vous</p>
    <form action="admin_connect.php" method="post" id="admin-login-form">
      <div class="input">
        <label for="textfield">Nom d'Utilisateur</label>
        <input id="user_name" type="text" name="adminname" value="">
        <div class="err">
          <div class="msg arrow_box">this field is empty</div>
        </div>
      </div>
      <div class="input">
        <label for="textfield">Mot de Passe</label>
        <input id="password" type="password" name="password" value="">
        <div class="err">
          <div class="msg arrow_box">this field is empty</div>
        </div>
      </div>
      <button class="next" type="sumit" style="left:120px" name="login">connecter</button>
      </form>
  </div>
  
  <script src="../js/login.js"></script>
</body>

</html>