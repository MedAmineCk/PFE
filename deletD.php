<?php 
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $demand_id=$_POST['demand_id'];
    $query="DELETE FROM Demande WHERE demand_id='$demand_id'";
   mysqli_query($connect,$query);

?>