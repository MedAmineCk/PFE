<?php


    

  if(isset($_POST["login"]))  
  {  
      
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    
     
          $username = mysqli_real_escape_string($connect, $_POST["user_name"]);  
          $password = mysqli_real_escape_string($connect, $_POST["password"]);
          $password=md5($password);
           
          $query = "SELECT * FROM User WHERE ( nom = '$username'  OR email = '$username')
                          AND password = '$password'";  
          $result = mysqli_query($connect, $query); 
          $row = mysqli_fetch_array($result);
          if(mysqli_num_rows($result) > 0)  
          {  
              session_start();
            $_SESSION["nomU"] = $row['nom'];
            $_SESSION["emailU"] = $row['email'];
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["connectedU"] =true;  
            header("location:dashboard.php");                   
          }  
          else  
          {  
                  echo '<script>alert("Wrong User Details")</script>'; 
                  header("location:index.php?login_access=false");  
          }  
        
  } 
  
   
  if(isset($_POST['logout'])){
      session_start();
      session_destroy();
      header("location:index.php"); 

  }





?>