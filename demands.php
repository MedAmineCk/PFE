
<article class="demands-main_container">
    <h1>Demandes</h1>
    <div class="container" id="content">
        <nav>
            <a id="demand_nv" href="#">demandes envoyer</a>
            <a  id="demand_acc" href="#">demandes accepter</a>
            <a id="demand_ref" href="#">demandes refuser</a>
        </nav>
        <div class="demands_container">
           
        empty
        </div>
       
    </div>

    
    <script>
      $('.demands_container').load('demand_nv.php');
      $('#demand_nv').on('click', function () {
            $('.demands_container').load('demand_nv.php')
        });
        $('#demand_acc').on('click', function () {
            $('.demands_container').load('demand_acc.php')
        });
        $('#demand_ref').on('click', function () {
            $('.demands_container').load('demand_ref.php')
        });
    </script>
</article>