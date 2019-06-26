<?php
$rub = $_POST['option'];
session_start();
$projet_id=$_SESSION['projectid'];
$connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
$query3 = "SELECT * FROM Rubrique,Rubrique_ligne WHERE Rubrique.rubrique_id=Rubrique_ligne.rubrique_id AND Rubrique_ligne.projet_id='$projet_id' AND nom_reb='$rub' "; 
$res3 = mysqli_query($connect,$query3);
$row3 = mysqli_fetch_array($res3);
$c_o = $row3['credit_ouver'];
$eng = $row3['engagement'];
$pm = $row3['paiment'];

echo "$c_o|$eng|$pm";
?>