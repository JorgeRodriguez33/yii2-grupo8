<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="site-login">
        <h2>Registrar Usuario</h2>
     
        <div><label for="nombre"></label></div>
        <div><input class="form-control"  type="text" id = "nombre" name="nombre" value="" placeholder="nombre"  /></div>
        <div><label for="password"></label></div>
        <div><input  class="form-control" type="password" id = "password"  name="password" value="" placeholder="password" /></div>

</br>
        <input name="enviar" value="Login" class="btn btn-primary btn-lg btn-block" onclick="makeLogin('http://localhost/yii2-grupo8/api/web/v1/apimobile/session')">

</div>


<script type="text/javascript">
/*  function makePOSTEJ(apiurl){  
$.post(apiurl,
    {username:"ravi",pass:"124",submit:true}).done(function(data, textStatus, jqXHR) 
        {
 
        }).fail(function(jqXHR, textStatus, errorThrown) 
    {
        alert(textStatus);
    });

  }  */



function makeLogin(apiurl){
    
    var user = document.getElementById("nombre").value;
    var pass = document.getElementById("password").value;
    $.post(apiurl,
    {username: user, password: pass},
    function(data, textStatus, jqXHR)
    {
      
      $.post('<?= Yii::$app->urlManager->createUrl("site/getsession")?>' + '?nom='+data, function( data ){
              });
        //data - response from server
    }).fail(function(jqXHR, textStatus, errorThrown) 
    {
        alert(textStatus);
    });
}

function makePOST(apiurl, callback){
    
    var user = document.getElementById("nombre").value;
    var pass = document.getElementById("password").value;
    alert(user);
    alert(pass);
          $.ajax({
              method: "POST",
              url: apiurl,
              data: { username: user, passwored: pass }
            })
             .done(function( respuesta ) {
                callback( respuesta );
              });
        }

        function makeGET(apiurl, callback){
          $.ajax({
              method: "GET",
              url: apiurl,
              data: { name: "John", location: "Boston" }
            })
              .done(function( respuesta ) {
                callback( respuesta );
              });
        }

        function dibujarTabla(datos){
           $('body').append('<table id="nuevatabla"></table>');
           
           $.each(datos, function( index, producto ) {
              $('#nuevatabla').append('<tr><td>'+producto.nombre+'</td></tr>')
            });
           
        }


        function loginConApi(datos){
            console.log(datos);
        }

        $(document).ready(function(){
            makeGET('http://localhost/yii2-grupo8/api/web/v1/productos',dibujarTabla);

        });


</script>