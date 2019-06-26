<?php 
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $demand_id=$_POST['demand_id'];
    $query="UPDATE Demande SET etat='accepter' WHERE demand_id='$demand_id'";
   mysqli_query($connect,$query);

?>