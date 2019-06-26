<?php
     session_start(); 
     $userid=$_SESSION["user_id"] ;
    $connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
    $query = "SELECT * FROM Demande,User WHERE   Demande.user_id=User.user_id AND (Demande.etat='accepter' OR Demande.etat='vueacc') AND User.user_id='$userid'"; 
    $res = mysqli_query($connect,$query);
    $row= mysqli_fetch_array($res);

    $adminid=$row['admin_id'];
    $query2 = "SELECT * FROM Admin WHERE admin_id='$adminid'"; 
    $res2 = mysqli_query($connect,$query2);
    $row2= mysqli_fetch_array($res2);
    $res = mysqli_query($connect,$query);
 ?>

    <?php if($count= mysqli_num_rows($res)){while ($row = mysqli_fetch_array($res)) {?>

    <div class="demand-item" data-user="<?php echo $row2['nom'];?>" data-email="<?php echo $row2['email'];?>"
        data-desc="<?php echo $row['discription'];?> " data-demandid="<?php echo $row["demand_id"];?>"
        data-d_date="date">
        <div class="icon">
        <i class="material-icons" style="font-size: 40px;">
                message
            </i>
        </div>
        <div class="demand-min_info">
            <div class="user"><?php echo $row2['nom'];?></div>
            <div class="desc"><?php echo $row2['email'];?></div>
        </div>
    </div><?php }}?>


<div class="demand-pop_up">
        <div class="pop-container">
            <button class="exit" onclick="$(this).parent().parent().hide()">
                <i class="material-icons">cancel</i>
            </button>
            <div class="user">user1</div>
            <div class="email">email@gmail.com</div>
            <div class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa debitis ad ratione sequi.
                Veniam alias, blanditiis itaque accusamus sint nam doloremque totam quasi enim rem laboriosam porro
                repudiandae voluptatum? Fugit?</div>
           
        </div>
</div>
<script>
        $('.demand-item').on('click', function () {
            $('.demand-pop_up').css({
                'display': 'flex'
            });
            var user = $(this).data('user');
            var email = $(this).data('email');
            var desc = $(this).data('desc');
            var d_date = $(this).data('d_date');
            var demand_id = $(this).data('demandid');
            console.log(demand_id)
            $('.demand-pop_up .user').html(user);
            $('.demand-pop_up .email').html(email);
            $('.demand-pop_up .desc').html(desc);
            $('.demand-pop_up .cancel').attr("data-demandid", demand_id);
            $('.demand-pop_up .save').attr("data-demandid", demand_id);

        });
        $('.save').on('click', function () {
            var demandid = $(this).data("demandid");

            console.log(demandid);
            $.ajax({
                type: "POST",
                url: "accepteD.php",
                data: {
                    demand_id: demandid
                },
                success: function (data) {
                    console.log('success');
                }
            });
            $('#main-container').load('demands.php');
        });


        $('.cancel').on('click', function () {
            var demandid = $(this).data("demandid");

            console.log(demandid);
            $.ajax({
                type: "POST",
                url: "rejectD.php",
                data: {
                    demand_id: demandid
                },
                success: function (data) {
                    console.log('success');
                }
            });
            $('#main-container').load('demands.php');
        });
        $('#demand_acc').on('click', function () {
            $('.demands_container').load('demand_acc.php')
        });
    </script>