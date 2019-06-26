<?php
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $query = "SELECT * FROM Historique,Admin WHERE    Historique.admin_id=Admin.admin_id"; 
    $res = mysqli_query($connect,$query);
 ?>




<article class="history-main_container">
    <h1>Historique</h1>
    <div class="container" id="content">
    <?php 

        while ($row = mysqli_fetch_array($res)) {
         echo '<section class="history-item">
            <div class="icon-container">
                <div class="icon"><i class="material-icons">
                history
            </i></div>
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