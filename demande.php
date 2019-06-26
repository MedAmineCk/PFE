 <?php  
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe'); 
    session_start(); 
    
    if(!isset($_SESSION["connectedU"])){
        header("location:index.php"); 
    } 
    $admin_id=1;
     
    if(isset($_POST["envoyer"]))  
    {  
            $rebname=$_POST["nom_r"];
            $username=$_SESSION["nomU"];
            $userid=$_SESSION["user_id"] ;
            $description= mysqli_real_escape_string($connect, $_POST["descr"]);  
            $date=date("Y-m-d");
            $query = "INSERT INTO Demande (admin_id,user_id,discription,etat,date) VALUES('$admin_id','$userid','$description','non','$date')";  
            if(mysqli_query($connect, $query))  
            {  
                






                header("location:dashboard.php"); 
                    
            }  
            else{
                echo '<script>alert("ERROR'. $userid. $description. '")</script>';  
            }



            
    }
 ?>