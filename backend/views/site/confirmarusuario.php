<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/moment.js"></script>

<?php
use yii\helpers\Html;

?>



<div class="site-confirmarusuario">

<div class="tablaComercios">
  <div class="row">
     <div class="col-md-12 col-md-6">
        <h4> Usuarios a ser confirmados <small>
        </small></h4>
        <table>
        <div id="container"></div>
        </table>
     </div>
  </div>
 </div>
</div>

<script type="text/javascript">
      $(window).load(function() {
    $('#nuevatabla').remove();
        //decode de json
		var data = <?php if(!empty($arrayNombres)){ echo json_encode($arrayNombres);}?>;
        var arrayComercios = Array();
         $('div#container').append('<table id="nuevatabla"></table>');  
           $.each(data, function( index, data ) {
              $('#nuevatabla').append('<tr><td class = btn btn-default id= comercio'+index+'>'+data+'</td></tr>');
            });
        $.each(data, function( index, data ) {
            $('td#comercio'+index).click(function(){
              var ddd = $(this).text();
              $('td#comercio'+index).remove();
              makeuser('<?= Yii::$app->urlManager->createUrl("site/confirmar") ?>'+ '?userName=' +ddd);
              //$('#rutas-ordencomercios').attr('value',arrayComercios);
            });
         });
    }); 

function makeuser(url){
    $.post(url,
    function(data, textStatus, jqXHR)
    {
    	alert(data);
        //data - response from server
    }).fail(function(jqXHR, textStatus, errorThrown) 
    {
        alert(textStatus);
    });
}


</script>