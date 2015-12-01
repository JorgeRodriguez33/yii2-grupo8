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
          
          <a href="#" style="margin-left:15px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Home <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
         
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
             <li><?php echo Html::a(Yii::t('app','Home'), ['../web/site/index'], ['class' => 'btn btn-default']); ?></li>
             <li><?php echo Html::a(Yii::t('app','Rutas'), ['../web/site/rutas'], ['class' => 'btn btn-default']); ?></li>

           </ul>
        </div>	
     </div>	
</div>
  <?php var_dump($comercioPedido);  ?>
    <div class="container" id="main">
       <div class="row">
        <div class="col-md-12"><h2>Pedidos</h2></div>
       <div class="col-md-12 col-sm-6">
          <div class="panel panel-default">
               <div class="panel-heading"> <h4>Pedidos de la ruta del dia</h4></div>
            <div class="panel-body">

                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#A" data-toggle="tab">ComercioA</a></li>
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
                                        <button class="btn btn-success pull-right" type="button">Aceptar</button>
                                 </div>

                              </form>
                          </div>
                        </div>
                      </div>
                    </div> <!-- /tabbable -->
                  
                </div>
        </div>
      </div>
   </div>
</div>
</body>
</html>




</div>



<script type="text/javascript">
$(window).load(function() 
{
var data = <?php if(!empty($comercioPedido)){ echo json_encode($comercioPedido);}?>;

alert(data);

$('div#container').append('<table id="nuevatabla"></table>');
$.each(data, function( index, data ) {
  $('#nuevatabla').append('<li><label>'+data+'</label><input class=form-control pull-right col-md-6 col-sm-6 placeholder=Ingrese cantidad id=producto' +index+'></input> </li>');
});
}); 
</script>