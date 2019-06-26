<?php

session_start();
$project=$_SESSION['projectid'];

$admin_id=$_SESSION['admin_id'];
$admin_nom=$_SESSION['nom'];
$connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
if(isset($_POST['delet'])){
    //historique    
$query3="SELECT * FROM Projets,User WHERE  Projets.user_id=User.user_id AND projet_id='$project'";
$res3=mysqli_query($connect,$query3);
    //historique donne
$query="SELECT * from Projets WHERE projet_id='$project'";
$res=mysqli_query($connect, $query);
$row=mysqli_fetch_array($res);
$user_id=$row['user_id'];
$query="DELETE FROM User WHERE user_id='$user_id'";
mysqli_query($connect, $query);
$query="DELETE FROM Projets WHERE projet_id='$project'";
mysqli_query($connect, $query);
$query="DELETE FROM Rubrique_ligne WHERE projet_id='$project'";
mysqli_query($connect, $query); 
$query="DELETE FROM Demande WHERE user_id='$user_id'";
mysqli_query($connect, $query); 

/*historique*/

$row=mysqli_fetch_array($res3);
$nom_projet=$row['nom_projet'];
$nom=$row['nom'];
$disc="le admin $admin_nom a supprimer le $nom_projet et le utilisateur $nom";
$date=date("Y-m-d");
$query="INSERT INTO Historique( projet_id, rubrique_id, date,admin_id,description) 
VALUES ('$project','$rub_id','$date','$admin_id','$disc')";
mysqli_query($connect,$query);




header("location:login.php?supprimer=true");

      
}?>