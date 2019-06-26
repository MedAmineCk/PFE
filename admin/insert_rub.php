<?php

    session_start();
    $admin_id=$_SESSION['admin_id'];
    $admin_nom=$_SESSION['nom'];
$projet_id=$_SESSION['projectid'];
$connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $rubr=$_POST['rubr'];
    echo $rubr;
    $query ="SELECT * FROM Rubrique WHERE nom_reb='$rubr'";
    $res= mysqli_query($connect,$query);
    $row= mysqli_fetch_array($res);
    $rub_id=$row['rubrique_id'];
    $co=$_POST['credit_ouver'];
    $eng=$_POST['engagement'];
    $py=$_POST['payement'];
    $dp=$_POST['disponible'];
   
    
    $query="SELECT * FROM Rubrique_ligne WHERE projet_id='$projet_id' AND rubrique_id='$rub_id'";
    $res = mysqli_query($connect,$query); 
    
    if($count=mysqli_num_rows($res)>0){
            $row=mysqli_fetch_array($res);
            $cred=$row['credit_ouver'];
            $dispo=$row['disponible'];
            $engag=$row['engagement'];
            $pyme=$row['paiment'];
            $eng=$eng+$engag;
            $py=$py+$pyme;
            $co=$co+$cred;

            
            $dp=$co-($eng+$py);
            $query="UPDATE Rubrique_ligne 
            SET credit_ouver='$co', engagement='$eng' ,paiment='$py',disponible='$dp'
            WHERE rubrique_id='$rub_id' AND projet_id='$projet_id'";
             mysqli_query($connect,$query);



            /*historique*/
             $query="SELECT * FROM Projets WHERE projet_id='$projet_id'";
             $res=mysqli_query($connect,$query);
             $row=mysqli_fetch_array($res);
             $nom_projet=$row['nom_projet'];
            $disc="le admin $admin_nom a modifier le rubrique $rubr dans le projet $nom_projet";
            $date=date("Y-m-d");
             $query="INSERT INTO Historique( projet_id, rubrique_id, date,admin_id,description) 
             VALUES ('$projet_id','$rub_id','$date','$admin_id','$disc')";
             mysqli_query($connect,$query);
            
            }
    else{
        $dp=$co-($eng+$py);
        $query="INSERT INTO Rubrique_ligne( projet_id, rubrique_id, credit_ouver, engagement, paiment, disponible) 
        VALUES ('$projet_id','$rub_id','$co','$eng','$py','$dp')";
        mysqli_query($connect,$query); 

        /*historique*/
        $query="SELECT * FROM Projets WHERE projet_id='$projet_id'";
        $res=mysqli_query($connect,$query);
        $row=mysqli_fetch_array($res);
        $nom_projet=$row['nom_projet'];
       $disc="le admin $admin_nom a ajouter le rubrique $rubr dans le projet $nom_projet";
       $date=date("Y-m-d");
        $query="INSERT INTO Historique( projet_id, rubrique_id, date,admin_id,description) 
        VALUES ('$projet_id','$rub_id','$date','$admin_id','$disc')";
        mysqli_query($connect,$query);
    }


   
?>