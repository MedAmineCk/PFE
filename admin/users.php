
<?php
$connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
$query = "SELECT * FROM User "; 
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
        <h1 class="title">UTILISATEURS</h1>
        <table id="file-table">
            <tr>
                <th>nom</th>
                <th>prénom</th>
                <th>téléphone</th>
                <th>email</th>
                
            </tr>
            <?php
            $res = mysqli_query($connect,$query);
            $i=0;
            while ($row = mysqli_fetch_array($res)) {
                
              echo "
            <tr>
                <td id='$i'><form method='post'>".$row["nom"]."</td>
                <td id='$i'>".$row["prenom"]."</td>
                <td id='$i'>".$row["phone"]."</td>
                <td id='$i'>".$row["email"]."</td>
                
            </tr>" ;
            
            $i=$i+1;} ?>
           
        </table>
    </div>
</body>

</html>