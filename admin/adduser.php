<?php
$project = $_POST['project'];
$prenom = $project['lastName'];
$phone = $project['phone'];
$email = $project['email'];
$password = $project['password'];
$query = "INSERT INTO User (nom,prenom,password,phone,email) VALUES('$username','$prenom','$password','$phone','$email')";  
?>