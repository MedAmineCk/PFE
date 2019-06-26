<?php
    session_start();
    $admin_id=$_SESSION['admin_id'];
    $admin_nom=$_SESSION['nom'];
    if(empty($_POST['project_title'])){
        header("location:dashboard.php");
    }else{
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');

    $P_name=$_POST['project_title'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $password=$_POST['password'];
    $password=md5($password);
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $des=$_POST['descr'];
    $query = "INSERT INTO User(nom,prenom,password,email,phone) values('$nom','$prenom','$password','$email','$phone')"; 
    if(mysqli_query($connect,$query)){
        echo 'done';
        $query = "SELECT user_id FROM User where nom='$nom' AND prenom='$prenom'"; 
        $res=mysqli_query($connect,$query);
        $row =mysqli_fetch_array($res);
        $id_user=$row["user_id"];
        $query="INSERT INTO Projets(nom_projet,user_id,description) values ('$P_name','$id_user','$des')";
        if(mysqli_query($connect,$query)){

        /*historique*/
        $query="SELECT * FROM Projets WHERE nom_projet='$P_name'";
        $res=mysqli_query($connect,$query);
        $row=mysqli_fetch_array($res);
        $nom_projet=$row['nom_projet'];
        $projet_id=$row['projet_id'];
       $disc="le admin $admin_nom a ajouter le $P_name pour utilisateur $nom";
       $date=date("Y-m-d");
        $query="INSERT INTO Historique( projet_id, rubrique_id, date,admin_id,description) 
        VALUES ('$projet_id','$rub_id','$date','$admin_id','$disc')";
        mysqli_query($connect,$query);
            
            header("location:dashboard.php"); 
    }}}
 ?>