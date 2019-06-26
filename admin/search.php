<?php 
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $search=$_REQUEST['search'];
    
    $query="SELECT * from Projets,User WHERE (Projets.user_id=User.user_id) AND Projets.nom_projet LIKE '%{$search}%'";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result)<=0){
        $query="SELECT * from Projets,User WHERE (Projets.user_id=User.user_id) AND User.nom LIKE '%{$search}%'";
    $result = mysqli_query($connect, $query);

    }
?>

<article>
<div id="add-project">
                <i class="material-icons">
                    add
                </i>
            </div>
    <h1>Projets</h1>
    <div class="container" id="content">
        <div class="projects">
            <?php while($row = mysqli_fetch_array($result)){ ;
                echo '<div class="project-item" data-projectid="'.$row["projet_id"].'">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 210 210"
                        style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <path d="M0,210v-210h210v210z" fill="none"></path>
                            <g fill="#ffffff">
                                <g id="surface1">
                                    <path
                                        d="M25.2,8.4c-13.86328,0 -25.2,11.33672 -25.2,25.2v121.8c0,13.86328 11.33672,25.2 25.2,25.2h184.8v-151.2h-160.45312c-2.08359,-11.79609 -11.96016,-21 -24.34687,-21zM25.2,16.8c9.31875,0 16.8,7.48125 16.8,16.8v103.09688c-4.4625,-4.01953 -10.35234,-6.49687 -16.8,-6.49687c-6.44766,0 -12.3375,2.47734 -16.8,6.49687v-103.09688c0,-9.31875 7.48125,-16.8 16.8,-16.8zM50.4,37.8h151.2v134.4h-176.4c-9.31875,0 -16.8,-7.48125 -16.8,-16.8c0,-9.31875 7.48125,-16.8 16.8,-16.8c9.31875,0 16.8,7.48125 16.8,16.8h8.4zM147,63l11.73047,11.73047l-22.23047,22.23047l-22.90312,-22.91953l-36.55313,32.00859l5.5125,6.3l30.64687,-26.79141l23.29688,23.28047l28.16953,-28.16953l11.73047,11.73047v-29.4zM71.4,134.4v8.4h105v-8.4z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="project-info">
                    <div class="project_title">
                '.$row["nom_projet"].'
                    </div>
                    <div class="user_name">
                    '.$row["nom"].'
                    </div>
                </div>
                </div>';                } ?>

            
            <div class="add-prj_pop">
                <div class="container-box animated rubberBand">
                    <form method="post" action="projectsave.php">

                        <button class="exit">
                            <i class="material-icons">cancel</i>
                        </button>
                        <div class="project-info">
                            
                                <div class="input">
                                    <label for="project_title">titre de projet:</label>
                                    <input id="project_title" type="text" name="project_title" value="">
                                    <div class="err">
                                        <div class="msg arrow_box">this field is empty</div>
                                    </div>
                                </div>
                                <div class="full_name">
                                    <div class="input">
                                        <label for="first_name">nom:</label>
                                        <input id="first_name" type="text" name="nom" value="">
                                        <div class="err">
                                            <div class="msg arrow_box">this field is empty</div>
                                        </div>
                                    </div>
                                    <div class="input">
                                        <label for="last_name">prénom:</label>
                                        <input id="last_name" type="text" name="prenom" value="">
                                        <div class="err">
                                            <div class="msg arrow_box">this field is empty</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <label for="email">email adress:</label>
                                    <input id="email" type="email" name="email" value="">
                                    <div class="err">
                                        <div class="msg arrow_box">this field is empty</div>
                                    </div>
                                </div>
                                <div class="input">
                                    <label for="phone">N° Téléphone:</label>
                                    <input id="phone" type="text" name="phone" value="">
                                    <div class="err">
                                        <div class="msg arrow_box">this field is empty</div>
                                    </div>
                                </div>
                                <div class="input">
                                    <label for="password">mot de passe:</label>
                                    <input id="password" type="text" name="password" value="">
                                    <div class="err">
                                        <div class="msg arrow_box">this field is empty</div>
                                    </div>
                                </div>


                        </div>
                        <div class="btns">
                            <button type="reset">Annuler</button>
                            <button class="save" type="submit" name="save">
                                <div class="icon">
                                </div>
                                <span>Enregistrer</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</article>
<script>
    $('.project-item').on('click', function () {
        var projectid=$(this).data("projectid");
        console.log(projectid);
        $.ajax({
            type:"POST",
            url:"session.php",
            data:{
                project_id:projectid
            },
            success:function(data){
                console.log('success');
            }
        });
        $('#content').load('project-mini_data.php');
        $('#display').on('click', function () {
            $('#content').load('project-file.php');
        })
    })
    $('#add-project').on('click', function () {
        $('.add-prj_pop').css({
            'display': 'flex'
        })
    })
    $('.add-prj_pop .exit').on('click', function () {
        $('.add-prj_pop').css({
            'display': 'none'
        })
    })
    $('.input input').focus(function () {
        $(this).siblings("label").css({
            'top': '-11px',
            'font-size': '12px',
            'padding': '2px'
        });
        $(this).parent().css({
            'border': '2px solid #03A9F4'
        });
    })
    $('.input input').focusout(function () {
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

 $('button.save').on('click', function () {
        var btn_text = $(this).find('span');
        var btn_icon = $(this).find('.icon');
        btn_text.html('En traitement..');
        btn_icon.html(
            '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  viewBox="0 0 100 100"  style="" xml:space="preserve" preserveAspectRatio="none" ><circle cx="50%" cy="50%" r="40%" stroke="rgba(43,43,43,0.3)" fill="none" stroke-width="10" stroke-linecap="round" /><circle cx="50%" cy="50%" r="40%" stroke="currentColor" fill="none" stroke-width="10" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="510" /><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4" /><animate attributeName="stroke" dur="6s" repeatCount="indefinite" values="#FFF" /></circle></svg>'
        );
        setTimeout(function () {
            $('button.save').css({
                'background-image': 'linear-gradient(-33deg, #08AEEA 0%, #2eff64 100%)'
            })
            btn_text.html('Terminé');
            btn_icon.html(
                '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 98.5 98.5" enable-background="new 0 0 98.5 98.5" xml:space="preserve"><path class="checkmark" fill="none" stroke-width="8" stroke-miterlimit="10" d="M81.7,17.8C73.5,9.3,62,4,49.2,4C24.3,4,4,24.3,4,49.2s20.3,45.2,45.2,45.2s45.2-20.3,45.2-45.2c0-8.6-2.4-16.6-6.5-23.4l0,0L45.6,68.2L24.7,47.3"/></svg>'
            );
            setTimeout(function () {
                var project_title = $('#project_title').val();
                var first_name = $('#first_name').val();
                var last_name = $('#last_name').val();
                var email_adress = $('#email').val();
                var phone_number = $('#phone').val();
                var user_password = $('#password').val();
                var project = new Array();
                project = {
                    title: project_title,
                    firstName: first_name,
                    lastName: last_name,
                    email: email_adress,
                    phone: phone_number,
                    password: user_password
                }
                /*
                $.ajax({
                    url: "adduser.php",
                    method: "POST",
                    data: project,
                    success: function (resp) {
                    },
                    error: function () {
                    }
                })
                */
                $('.add-prj_pop .container-box .project-info').html(
                    '<div class="project-data">' +
                    'title: ' + project.title + '</br>' +
                    'first name: ' + project.firstName + '</br>' +
                    'last name: ' + project.lastName + '</br>' +
                    'email adress: ' + project.email + '</br>' +
                    'phone number: ' + project.phone + '</br>' +
                    'user password: ' + project.password + '</br>' +
                    '</div>'
                );
                $('.add-prj_pop .container-box .btns').html(
                    '<button class="edit">edite</button>' +
                    '<button class="download" type="submit" name="save">download</button>' +
                    '<button class="send" >send via email</button>'
                )
            }, 1000);
        }, 2000);

    })
</script>