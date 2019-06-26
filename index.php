<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style-index.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="js/plug/jQuery.min.js"></script>
</head>

<body>
    <header>
        <div class="logo">
            <img src="img/icons/logo.svg" alt="">
        </div>
        <nav>
            <ul>
               <li>Accueil</li>
                <li>Nous</li>
                <li class="login"><button class="login bnt login-as_Admin" style="
                    background: transparent;
                    border: none;
                    color: white;
                    width: 100%;
                    height: 100%;" type='button' onclick="window.location.href='admin/login.php'">Admin</button>
                </li>
            </ul>
        </nav>
    </header>
    <section class="container">

        <div class="login">
            <div class="login-interface">
                <div class="login-icon">
                    <div class="icon">
                        <i class="material-icons">account_circle</i>
                    </div>
                </div>
                <div class="title" style="text-align: center;">connectez vous</div>
                <form method="post" action="user_connect.php" id="login-form">
                    <div class="input">
                        <label for="textfield">Nom d'utilisateur</label>
                        <input id="user_name" type="text" name="user_name" value="">
                        <div class="err">
                            <div class="msg arrow_box">this field is empty</div>
                        </div>
                    </div>
                    <div class="input">
                        <label for="textfield">Mot de Passe</label>
                        <input id="user_name" type="password" name="password" value="">
                        <div class="err">
                            <div class="msg arrow_box">this field is empty</div>
                        </div>
                    </div>
                   
                    <div class="btns">
                        <button class="connected" style="justify-content: center;" id="connect" name="login" type="submit">
                            connecter
                        </button>
                        <script>
                            $('.input input').each(function () {
                                if ($(this).val() != '' || $(this).length > 0) {
                                    $(this).siblings("label").css({
                                        'top': '-11px',
                                        'font-size': '12px',
                                        'padding': '2px'
                                    });
                                }
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

                            function isEmpty() {
                                var isEmpty = true;
                                $("input").each(function () {
                                    var element = $(this);
                                    if (element.val() == "") {
                                        $(this).siblings('.err').css({
                                            'display': 'block'
                                        })
                                        $(this).parent().css({
                                            'border': '1px solid #E91E63'
                                        });
                                        isEmpty = true;
                                    } else {
                                        isEmpty = false;
                                    }
                                })
                                return isEmpty;
                            }

                            $('#login-form').submit(function(){
                                if(isEmpty()){
                                    return false;
                                }
                            })
                        </script>
                </form>
            </div>
        </div>
        </div>
    </section>

</body>

</html>