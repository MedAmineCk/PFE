<?php
session_start();
$user_id=$_SESSION['user_id'];
$connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
$query ="SELECT * from User WHERE user_id='$user_id' ";
   $result = mysqli_query($connect, $query);
   $row=mysqli_fetch_array($result); 
?>
<article class="setting">
    <form method="post" action="edit_user.php" id="setting-form">
        <h1>Pramétre</h1>
        <div class="container" id="content">
            <div class="user-setting">
                <div class="input">
                    <label for="textfield">Nom</label>
                    <input type="text" name="nom" value="<?php echo $row['nom']; ?>">
                    <div class="err">
                        <div class="msg arrow_box">this field is empty</div>
                    </div>
                </div>
                <div class="input">
                    <label for="textfield">Prénom</label>
                    <input type="text" name="prenom" value="<?php echo $row['prenom']; ?>">
                    <div class="err">
                        <div class="msg arrow_box">this field is empty</div>
                    </div>
                </div>
                <div class="input">
                    <label for="textfield">Email</label>
                    <input type="text" name="email" value="<?php echo $row['email']; ?>">
                    <div class="err">
                        <div class="msg arrow_box">this field is empty</div>
                    </div>
                </div>
                <div class="input">
                    <label for="textfield">Téléphone</label>
                    <input type="text" name="phone" value="<?php echo $row['phone']; ?>">
                    <div class="err">
                        <div class="msg arrow_box">this field is empty</div>
                    </div>
                </div>

                <div class="password">
                    <div class="input">
                        <label for="textfield">Mot de Passe</label>
                        <input type="password" name="password1">
                        <div class="err">
                            <div class="msg arrow_box">this field is empty</div>
                        </div>
                    </div>
                    <div class="input">
                        <label for="textfield">Nouveau Mot de Passe</label>
                        <input type="password" name="password2" value="">
                        <div class="err">
                            <div class="msg arrow_box">this field is empty</div>
                        </div>
                    </div>
                </div>
                <div class="btns">
                    <button type="reset">Annuler</button>
                    <button class="save" type="submit" name="editer">
                        <div class="icon">
                        </div>
                        <span>Enregistrer</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</article>

<script>
    $.each($('.input input'), function () {
        if ($(this).val() != '') {
            console.log('not empty');
            $(this).siblings("label").css({
                'top': '-11px',
                'font-size': '12px',
                'padding': '2px'
            });
        }
    });
    $('.input input').focus(function () {
        $(this).siblings("label").css({
            'top': '-11px',
            'font-size': '12px',
            'padding': '2px'
        });
        $(this).parent().css({
            'border': '2px solid #03A9F4'
        });
        $(this).select();
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
        $("#setting-form input").each(function () {
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
    $('#setting-form').submit(function () {
        if (isEmpty()) {
            return false;
        } else {
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
            }, 3000);
        }
    })
</script>