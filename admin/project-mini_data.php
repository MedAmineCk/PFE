<?php 
session_start();
$project=$_SESSION['projectid'];
$connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
                 $query = "SELECT * FROM Projets,User WHERE Projets.user_id=User.user_id AND projet_id='$project' ";  
                    $result = mysqli_query($connect, $query);
                    $row=mysqli_fetch_array($result); 
                
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="mini-data">
        <section class="user">
            <div class="user-info">
                <ul>
                    <li>
                        <span class="icon">
                            <i class="material-icons">face</i>
                        </span>
                        <span class="user-data">
                            <?php  echo $row['nom']; ?>
                        </span>
                    </li>
                    <li>
                        <span class="icon">
                            <i class="material-icons">face</i>
                        </span>
                        <span class="user-data">
                            <?php  echo $row['prenom']; ?>
                        </span>
                    </li>
                    <li>
                        <span class="icon">
                            <i class="material-icons">alternate_email</i>
                        </span>
                        <span class="user-data">
                            <?php  echo $row['email']; ?>
                        </span>
                    </li>
                    <li>
                        <span class="icon">
                            <i class="material-icons">phone</i>
                        </span>
                        <span class="user-data">
                            <?php  echo $row['phone']; ?>
                        </span>
                    </li>
                    
                </ul>
                <a href="#">
                    <span class="icon">
                        <i class="material-icons">message</i>
                    </span>
                    <span class="msg">
                        envoyer un message
                    </span>
                </a>

            </div>
        </section>
        <section class="project-description">
            <div class="desc">
                <h3><?php  echo $row['nom_projet']; ?> </h3>
                <div class="desciption">
                    <?php  echo $row['description']; ?>
                </div>
            </div>
            <section class="btns">
                <button class="btn" id="display" onClick="$('#content').load('project-file.php');">consulter</button>
                <button class="btn" onClick="$('#content').load('rub.php'); $('#add-project').hide();">editer</button>
                <button class="btn" onclick="$('.alert-pop_up').show();">supprimer</button>
            </section>
            <div class="alert-pop_up" style="display: none">
                <div class="del-alert animated rubberBand">
                    <i class="material-icons">warning</i>
                    <h1>Êtes-vous sûr de supprimer ce projet?</h1>
                    <p>cette action supprimera ce projet et tous les objets associés</p>
                    <div class="btns">
                        <button class="cancel" onclick="$('.alert-pop_up').hide();">Annuler</button>
                        <form method="post" action="del.php">
                            <button class="btn del" type="submit" name="delet">Oui! Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>