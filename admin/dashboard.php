<?php 
    session_start();
    if(!$_SESSION["connectedA"]){header("location:login.php");}

    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $query = "SELECT * FROM Demande,User WHERE  Demande.user_id=User.user_id AND etat='non' "; 
    $res = mysqli_query($connect,$query);
    $count= mysqli_num_rows($res);
    $res = mysqli_query($connect,$query);
    
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../js/plug/jQuery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <!-- PUT YOUR CODE HERE-->
    <header>
        <div class="logo">
            <img src="../img/icons/logo.svg" alt="">
        </div>
        
        <div class="search">
            <input type="search" id="serch"  placeholder="chercher" >
            <button type="submit" name="serchBT" class="serchBT">
                <i class="material-icons">
                    search
                </i>
            </button>
        
        </div>
        <div class="info">
            <div class="notify">
                <i class="material-icons">
                    notifications
                </i>
                <?php if($count>0){ 
                    $row=mysqli_fetch_array($res);
                    echo'
                <span id="notify_counter">'.$count.'</span>
               
                
                <ul class="notify_container" data-demandid="'.$row["demand_id"].'">';
                $res = mysqli_query($connect,$query);
                while($row=mysqli_fetch_array($res)){ echo '
                    <li >
                        <span>
                            <i class="material-icons">notification_important</i>
                        </span>
                        <p>demande de '.$row['nom'].'</p>
                        <span class="cancel" data-demandid="'.$row["demand_id"].'">
                            <i class="material-icons">cancel</i>
                        </span>
                    </li>';
                ?>
                <?php }}?>
                    <script>
                        $('.notify_container .cancel').on('click', function () {
                            $(this).parent().fadeOut();
                            
                            var demandid=$(this).data("demandid");
                                
                                console.log(demandid);
                                $.ajax({
                                    type:"POST",
                                    url:"demandeAvoir.php",
                                    data:{
                                        demand_id:demandid
                                    },
                                    success:function(data){
                                        console.log('success');
                                    }
                                    
                                });
                                window.location.reload();
                                $('#main-container').load('demands.php');
                        })
                        
                        $(function () {
                            
                            var origTitle, animatedTitle, timer;
                            var notifi_counter = <?php echo $count;?>;

                            function animateTitle(newTitle) {
                                var currentState = false;
                                origTitle = document.title; // save original title
                                animatedTitle = "("+notifi_counter+") notification | " + origTitle;
                                timer = setInterval(startAnimation, 2000);

                                function startAnimation() {
                                    // animate between the original and the new title
                                    document.title = currentState ? origTitle : animatedTitle;
                                    currentState = !currentState;
                                }
                            }
                        
                        <?php if($count>0){?>
                            function restoreTitle() {
                                clearInterval(timer);
                                document.title = origTitle; // restore original title
                            }

                            // Change page title on blur
                            $(window).blur(function () {
                                animateTitle();
                            });

                            // Change page title back on focus
                            $(window).focus(function () {
                                restoreTitle();
                            });
                            <?php }?>
                        });
                    </script>
                </ul>
            </div>
            <div class="user">
                <i class="material-icons">
                    account_circle
                </i>
                <div class="user-info_header">
                    <p><?php echo $_SESSION["nom"];?></p>
                    <p><?php echo $_SESSION["email"];?></p>
                    <form method="post" action="login.php">
                        <button id="log_out" type="submit" name="logout">Déconnexion</button></form>
                </div>
            </div>
        </div>
    </header>

   
    <aside class="side_bar">
        <nav class="menu">
            <ul>
                <li class="projects">
                    <span class="icon">
                        <i class="material-icons">
                            view_quilt
                        </i>
                    </span>
                    <p>Projets</p>

                </li>
                <li class="users">
                    <span class="icon">
                        <i class="material-icons">
                            supervised_user_circle
                        </i>
                    </span>
                    <p>proteurs des projets</p>
                </li>
                <li class="history">
                    <span class="icon">
                        <i class="material-icons">
                            history
                        </i>
                    </span>
                    <p>Historique</p>
                </li>
                <li class="demands">
                    <span class="icon">
                        <i class="material-icons">
                            feedback
                        </i>
                    </span>
                    <p>Demandes</p>
                </li>
                <li class="setting">
                    <span class="icon">
                        <i class="material-icons">
                            settings
                        </i>
                    </span>
                    <p>Paramétre</p>
                </li>
            </ul>
        </nav>
    </aside>
    <section class="container" id="main-container">
        
    </section>
    <footer></footer>

  <script>$('#main-container').load('projects.php');</script>
       
            <script >
                 
                
                $('nav li.projects').on('click', function () {
                    $('#main-container').load('projects.php');
                })
                $('nav li.users').on('click', function () {
                    $('#main-container').load('users.php');
                })
                $('nav li.demands').on('click', function () {
                    $('#main-container').load('demands.php');
                })
                $('nav li.history').on('click', function () {
                    $('#main-container').load('history.php');
                    $('section.history-item').on('click', function () {
                        alert()
                    })
                })
                $('nav li.setting').on('click', function () {
                    $('#main-container').load('user-setting.php');
                })

                $('.serchBT').on('click', function () {
                    
                    var serch=$("#serch").val();
                    $('#main-container').load('search.php?search=' + encodeURIComponent(serch));
                    //$('#main-container').load('projects.php?search=' + encodeURIComponent(serch));
                    /*console.log(serch);
                    $.ajax({
                        type:"POST",
                        url:"search.php",
                        data:{
                            search:serch
                        },
                          success:function(data){
                            console.log('success');
                         }
                        
                    });*/
                    
                    
                });
            </script>
    
</body>

</html>