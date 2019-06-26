<?php
session_start();
$user_id=$_SESSION['user_id'];
if(isset($_POST["editer"]))  
{  $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
   $password1=$_POST['password1'];
   $password1=md5($password1);
   $query ="SELECT * from User WHERE user_id='$user_id' AND password='$password1'";
   $result = mysqli_query($connect, $query); 
   if(mysqli_num_rows($result) > 0) {
      
    $nom=$_POST['nom'];
    $nom=$_POST['prenom'];
         $email=$_POST['email'];
         $phone=$_POST['phone'];
         $password=md5($_POST['password2']);
  
      $query = "UPDATE User SET nom='$nom',prenom='$prenom',password='$password',email='$email',phone='$phone' WHERE user_id='$user_id'";  
      $result = mysqli_query($connect, $query); 
      if($result){
    
      header("location:dashboard.php"); 
      
   }
}
}
?>