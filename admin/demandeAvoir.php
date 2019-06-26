<?php 
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $demand_id=$_POST['demand_id'];
    $query="UPDATE Demande SET etat='avoir' WHERE demand_id='$demand_id'";
   mysqli_query($connect,$query);

?>
<script>
$('#main-container').load('demands.php');
</script>