<div id="rub-edit">
<?php
session_start();
$projet_id=$_SESSION['projectid'];
$connect = mysqli_connect('localhost', 'root', 'soufianeasad', 'pfe');
$query = "SELECT * FROM Rubrique,Rubrique_ligne WHERE Rubrique.rubrique_id=Rubrique_ligne.rubrique_id "; 
$res = mysqli_query($connect,$query);
$query2 = "SELECT * FROM Rubrique "; 
$res2 = mysqli_query($connect,$query);
$query3 = "SELECT * FROM Rubrique where nom LIKE %NV% "; 
$res3 = mysqli_query($connect,$query3);


?>
<div id="add-rub" onclick="$('.pop-up-rub_container').show();">
        <i class="material-icons">add</i>
    </div>
    <div class="pop-up-rub_container" style="display: none">
        <div class="pop-content animated rubberBand">
            <h1 style="text-align: center;margin: 20px;" >add rub</h1>
            <div class="select_rebrique">
                <div class="reb_container">
                    <span>Rebrique: </span>
                    <select name="nom_r" id="">
                        <?php while($row3=mysqli_fetch_array($res3)){?>
                        <option><?php echo $row3['nom']?></option>
                        
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="input">
                <label for="textfield">crédit ouvert</label>
                <input id="user_name" type="text" name="adminname" value="">
                <div class="err">
                    <div class="msg arrow_box">this field is empty</div>
                </div>
            </div>
            <div class="input">
                <label for="textfield">engagement</label>
                <input id="user_name" type="text" name="adminname" value="">
                <div class="err">
                    <div class="msg arrow_box">this field is empty</div>
                </div>
            </div>
            <div class="input">
                <label for="textfield">payment</label>
                <input id="user_name" type="text" name="adminname" value="">
                <div class="err">
                    <div class="msg arrow_box">this field is empty</div>
                </div>
            </div>
            <div class="btns">
                <button class="cancel" onclick="$('.pop-up-rub_container').hide();">Annuler</button>
                <button class="confirme">Ajouter</button>
            </div>
        </div>
    </div>
<table id="file-table" class="rub-edit">

    <tr>
        <th>nom du rubrique</th>
        <th>crédit ouvert</th>
        <th>engagement</th>
        <th>payment</th>
        
        <th></th>

    </tr>

    <tr>
        <td><form method="post">
            <select name="rubr" id='nom'>
                <option>--------------</option>
                <?php while($row = mysqli_fetch_array($res)){?>
                <option value="<?php echo $row['nom_reb'];?>"><?php echo $row['nom_reb'];?></option>
                <?php } ?>
            </select>
            </form></td>
        <td><input type="text" name="credit_ouver" id='co'></td>
        <td><input type="text" name="engagement" id='eng'></td>
        <td><input type="text" name="payement" id='py'></td>
        <td><button id="save">Modifier</button></td>
    </tr>

</table>

<script>
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
        
    $('#nom').on('change',function() {
        var opt = this.value;
        var data_tab;
        console.log(opt);
        $.ajax({
                type: "POST",
                url: "edit_rub.php",
                data: {
                    option: opt
                },
                success: function (result) {
                    console.log('success'+result);
                    data_tab = result.split("|");
                    $('#co').val(data_tab['0']);
                    $('#eng').val(data_tab['1']);
                    $('#py').val(data_tab['2']);
                }
            });
        
    })
</script>
<script>
    function isEmpty(){
        var isEmpty = true;
        $('.rub-edit input').each(function(){
            var element = $(this);
            if (element.val() == "") {
                $(this).css({
                    'border': '2px solid red'
                })
                isEmpty = true;
            }else{
                isEmpty = false;
            }
        })
        return isEmpty;
    }
    $("#save").on("click", function () {
        if (isEmpty()) {
            return false
        } else {
            nom = $("#nom").val();
            co = $("#co").val();
            eng = $("#eng").val();
            py = $("#py").val();
            dp = $("#dp").val();
            $("#file-table").append('<tr>' +
                '<td>' + nom + '</td>' +
                '<td>' + co + '</td>' +
                '<td>' + eng + '</td>' +
                '<td>' + py + '</td>' +
                '<td>' + dp + '</td>' +
                '</tr>'
            );
            $.ajax({
                type: "POST",
                url: "insert_rub.php",
                data: {
                    rubr: nom,
                    credit_ouver: co,
                    engagement: eng,
                    payement: py,
                    disponible: dp
                },
                success: function (data) {
                    console.log('success');
                }
            });
        }

    });
</script>
</div>