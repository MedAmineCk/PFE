<?php 
   
    if(isset($_POST["login"]))  
    {  
        
      $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
      if(!$connect){
        echo '<script>alert("base")</script>'; 
      }
       
            $adminname = mysqli_real_escape_string($connect, $_POST["adminname"]);  
            $password = mysqli_real_escape_string($connect, $_POST["password"]); 
            $password=md5($password) ;
             
            $query = "SELECT * FROM Admin WHERE ( nom = '$adminname' OR prenom = '$adminname' OR email = '$adminname' OR phone = '$adminname')
                            AND password = '$password'";  
            $result = mysqli_query($connect, $query);  
            if(mysqli_num_rows($result) > 0)  
            {  session_start();
              
              $row=mysqli_fetch_array($result);
              $_SESSION["admin_id"]=$row["admin_id"];
              $_SESSION["nom"]=$row["nom"];
              $_SESSION["email"]=$row["email"];
              $_SESSION["connectedA"] = true;  
              header("location:dashboard.php");                   
            }  
            else  
            {  
                    echo '<script>alert("Wrong User Details")</script>';  
                      //header("location:login.php"); 
            }  

          
    } 
    
     
    if(isset($_POST['logout'])){
        session_start();
        session_destroy();
        header("location:login.php"); 

    }


 

?>