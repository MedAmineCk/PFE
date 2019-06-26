<?php
    session_start();
    if(!$_SESSION["connectedU"]){header("location:index.php");}
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $userid=$_SESSION['user_id'];
    $query = "SELECT * FROM Demande,User WHERE  Demande.user_id=User.user_id AND (etat='rejecter' Or etat='accepter') AND Demande.user_id='$userid' "; 
    $res = mysqli_query($connect,$query);
    $count= mysqli_num_rows($res);
    $res = mysqli_query($connect,$query);
    if(isset($_POST['logout'])){
        session_destroy();
        header("location:index.php");
    }
    $query3 = "SELECT * FROM Projets WHERE user_id='$userid' "; 
    $res3 = mysqli_query($connect,$query3);
    $row3=mysqli_fetch_array($res3);
    $query4 = "SELECT * FROM Projets,Rubrique,Rubrique_ligne WHERE 
            Projets.projet_id=Rubrique_ligne.projet_id AND
            Rubrique_ligne.rubrique_id=Rubrique.rubrique_id AND
            Projets.user_id='$userid' "; 
    $res4 = mysqli_query($connect,$query4);
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="js/plug/jQuery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <!-- PUT YOUR CODE HERE-->
    <header>
        <div class="logo">
            <img src="img/icons/logo.svg" alt="">
        </div>
        <div class="search">
            <input type="search" id="serch"  placeholder="chercher">
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
                while($row=mysqli_fetch_array($res)){ 
                    $et=$row['etat'];
                    echo '    
                    <li>
                        <span>
                            <i class="material-icons">notification_important</i>
                        </span>
                        <p>demande  '.$et.'</p>
                        <span class="cancel" data-demandid="'.$row["demand_id"].'" data-demandetat="'.$et.'">
                            <i class="material-icons">cancel</i>
                        </span>
                    </li>';
                }}?>
                    <script>
                        $('.notify_container .cancel').on('click', function () {
                            $(this).parent().fadeOut();
                            
                                var demandid=$(this).data("demandid");
                                var demandetat=$(this).data("demandetat");
                                console.log(demandid);
                                $.ajax({
                                    type:"POST",
                                    url:"vueD.php",
                                    data:{
                                        demand_id:demandid,
                                        demand_etat:demandetat
                                    },
                                    success:function(data){
                                        console.log('success');
                                    }
                                    
                                });
                                window.location.reload();
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
                <p><?php echo $_SESSION["nomU"];?></p>
                    <p><?php echo $_SESSION["emailU"];?></p>
                    <form method="post" >
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
                    <p>paramétre</p>
                </li>
            </ul>
        </nav>
    </aside>
    <section class="container" id="main-container">

    </section>
    <button class="edit">
        <i class="material-icons">edit</i>
    </button>
    <div class="pop_up-edit">
        <div class="container animated rubberBand">
            <div class="cancel">
                <i class="material-icons">cancel</i>
            </div>
            <form action="demande.php" method="post" id="send_request-form">
                <h1 class="title"><?php echo $row3['nom_projet'];?></h1>
                <div class="select_rebrique">
                <div class="reb_container">
                    <span>Rubrique: </span>
                    <select name="nom_r" id="">
                        <?php while( $row4=mysqli_fetch_array($res4)){?>
                        <option ><?php echo $row4['nom_reb'];?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
              
                <div class="description">
                    <label for="">description</label><br>
                    <textarea name="descr" id="desc" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" id="send_request" name="envoyer">
                    envoyer demande
                    <i class="material-icons">send</i>
                </button>
                <script>
                $('.description textarea').focus(function () {
                    $(this).siblings("label").css({
                        'top': '-11px',
                        'font-size': '12px',
                        'background': '#fff',
                        'padding': '2px'
                    });
                    $(this).parent().css({
                        'border': '2px solid #03A9F4'
                    });
                })
                $('.description textarea').focusout(function () {
                    if ($(this).val() != '') {
                        $(this).parent().css({
                            'border': '1px solid #ccc'
                        });
                        $(this).siblings('.err').css({
                            'display': 'none'
                        })
                    } else {
                        $(this).siblings("label").css({
                            'left': '10px',
                            'top': '10px',
                            'font-size': '18px'
                        });
                        $(this).parent().css({
                            'border': '1px solid #ccc'
                        });
                    }
                })
                $('.input input').on('input', function () {
                    $(this).siblings('.err').css({
                        'display': 'none'
                    })
                });
                $('#send_request-form').submit(function(){
                    if($('#desc').val() == ''){
                        $('#desc').css({
                            'border': '2px solid red'
                        })
                        return false;
                    }
                })
            </script>
            </form>
        </div>

    </div>
    <footer></footer>
    <!--the End-->
    <script>
        $('#main-container').load('project-file.php');
        $('nav li.projects').on('click', function () {
            $('#main-container').load('project-file.php');
        })
        $('button.edit').on('click', function () {
            $('.pop_up-edit').css({
                'display': 'flex'
            })
            $('.cancel').on('click', function () {
                $('.pop_up-edit').css({
                    'display': 'none'
                })
            })
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