<?php
    session_start();
    $user_id=$_SESSION['user_id'];
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $query="SELECT * FROM Projets,User WHERE Projets.user_id=User.user_id
     AND User.user_id='$user_id'";
     $res = mysqli_query($connect,$query);
     $row=mysqli_fetch_array($res);
     $projet_id=$row['projet_id'];
    $query = "SELECT * FROM Historique,Rubrique,Admin WHERE Historique.rubrique_id =Rubrique.rubrique_id 
    AND  Historique.admin_id=Admin.admin_id AND Historique.projet_id='$projet_id'"; 
    $res = mysqli_query($connect,$query);

 ?>




<article class="history-main_container">
    <h1>Historique</h1>
    <div class="container" id="content">
    <?php 

        while ($row = mysqli_fetch_array($res)) {
         echo '<section class="history-item">
            <div class="icon-container">
                <div class="icon">
                    <i class="material-icons">
                        history
                    </i>
                </div>
            </div>
            <div class="content">
                <div class="title">'.$row["nom"].'</div>
                <p>'.$row["description"].'</p>
            </div>
            <div class="date">'.$row["date"].'</div>
        </section>';}
        
       ?>
    </div>
</article>