
<?php
session_start();
$projectid=$_SESSION['projectid'];
$connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
$query = "SELECT * FROM Rubrique,Projets,Rubrique_ligne WHERE Rubrique_ligne.rubrique_id = Rubrique.rubrique_id AND  Rubrique_ligne.projet_id=Projets.projet_id AND Projets.projet_id='$projectid'"; 
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_array($res);
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
    <div class="project-file">
        <h1 class="title"><?php echo $row["nom_projet"];?></h1>
        <table id="file-table">
            <tr>
                <th>N° rubrique</th>
                <th>rubrique</th>
                <th>crédit ouvert</th>
                <th>engagement</th>
                <th>payment</th>
                <th>disponible</th>
            </tr>
            <?php
            $res = mysqli_query($connect,$query);
            while ($row = mysqli_fetch_array($res)) {
              echo "
            <tr>
                <td>".$row["num_reb"]."</td>
                <td>".$row["nom_reb"]."</td>
                <td>".$row["credit_ouver"]."</td>
                <td>".$row["engagement"]."</td>
                <td>".$row["paiment"]."</td>
                <td>".$row["disponible"]."</td>
            </tr>" ;} ?>
           
        </table>
    </div>
</body>

</html>