
<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-pedido">
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/css; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-fixed-top header">
 	<div class="col-md-12">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
          <i class="glyphicon glyphicon-search"></i>
          </button>
      
        </div>
        
        </div>	
     </div>	
</nav>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
        <div class="navbar-header">

        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse3">
          <ul class="nav navbar-nav navbar-right">
              <li><?php echo Html::a(Yii::t('app','Home'), ['../web/site/index'], ['class' => 'btn btn-default']); ?></li>
              <li><?php echo Html::a(Yii::t('app','Stock'), ['../web/site/stock?id='.$idComercio], ['class' => 'btn btn-default']); ?></li>
           </ul>
        </div>
     </div>	
</div>

    <div class="container" id="main">
       <div class="row">
        <div class="col-md-12"><h2>Pedidos</h2></div>
       <div class="col-md-12 col-sm-6">
          <div class="panel panel-default">
               <div class="panel-heading"> <h4>Pedidos de la ruta del dia</h4></div>
            <div class="panel-body">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#A" data-toggle="tab"><?=$nombreComercio?></a></li>
                    </ul>
                    <div class="tabbable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="A">
                          <div class="well well-sm">Ingrese el pedido.
                            <form class="form-horizontal" role="form">
                                 <div class="form-group" style="padding:14px;">
                                        <ul class="table-form">
                                          <div id="container"></div>
                                        </ul> 
                                        <button class="btn btn-success pull-right" type="button" onclick="makePedido('http://localhost/yii2-grupo8/api/web/v1/pedidos')">Aceptar</button>
                                 </div>

                              </form>
                          </div>
                        </div>
                      </div>
                    </div>     
            </div>
        </div>
      </div>
   </div>
</div>
</body>
</html>




</div>

<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/moment.js"></script>

<script type="text/javascript">

var cantProd = 0;
var arrayNombre = Array();
var nomCom = <?php if(!empty($nombreComercio)){ echo json_encode($nombreComercio);}?>; 
function makePedido(apiurl){
  for (i = 0; i < cantProd; i++) {
  var cantidades = document.getElementById("producto"+i).value;
    $.post(apiurl,
    {nombreComercio:nomCom , nombreProducto: arrayNombre[i],cantidad:cantidades},
    function(data, textStatus, jqXHR)
    {
      alert("Pedido Generado!");
      
    }).fail(function(jqXHR, textStatus, errorThrown) 
    {
        alert(textStatus);
    });

    }
}



$(window).load(function() 
{
var data = <?php if(!empty($comercioPedido)){ echo json_encode($comercioPedido);}?>;



$('div#container').append('<table id="nuevatabla"></table>');
$.each(data, function( index, data ) {
  arrayNombre.push(data);
  $('#nuevatabla').append('<li><label id=nomProd'+index+'>'+data+'</label><input class=form-control pull-right col-md-6 col-sm-6 placeholder=Ingrese cantidad id=producto' +index+'></input> </li>');
  cantProd++;
});

}); 
</script>