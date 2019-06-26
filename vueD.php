<?php 
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $demand_id=$_POST['demand_id'];
    $demand_etat=$_POST['demand_etat'];
    if($demand_etat=='rejecter'){
 $query="UPDATE Demande SET etat='vuerej'  WHERE demand_id='$demand_id'";
 mysqli_query($connect,$query);
}
 if($demand_etat=='accepter'){
    $query="UPDATE Demande SET etat='vueacc'  WHERE demand_id='$demand_id'";
    mysqli_query($connect,$query);}
   

 ?>