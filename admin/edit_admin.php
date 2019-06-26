<?php
session_start();
$admin_id=$_SESSION['admin_id'];
if(isset($_POST["editer"]))  
{  $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
   $password1=$_POST['password1'];
   $password1=md5($password1);
   $query ="SELECT * from Admin WHERE admin_id='$admin_id' AND password='$password1'";
   $result = mysqli_query($connect, $query); 
   if(mysqli_num_rows($result) > 0) {
      $nom=$_POST['nom'];
      $nom=$_POST['prenom'];
      $phone=$_POST['phone'];
         $email=$_POST['email'];
         $password=md5($_POST['password2']);
  
      $query = "UPDATE Admin SET nom='$nom',prenom='$prenom',password='$password',email='$email',phone='$phone' WHERE admin_id='$admin_id'";  
      $result = mysqli_query($connect, $query); 
      if($result){
    
      header("location:dashboard.php"); 
      
   }
}
}
?>