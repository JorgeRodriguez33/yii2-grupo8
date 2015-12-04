<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Comercios; 
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-rutas">
    <?php
      session_start();
      $comercios = ArrayHelper::toArray(Comercios::find()->all());
      var_dump($comercios);
     ?>
    <html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Bootstrap Google Plus Theme</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"  rel="stylesheet">
    
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        
        <link href="css/styles.css" rel="stylesheet">
    <style>
      /* To keep short panes open decently tall */
      .tab-pane {min-height: 400px;}
    </style>
    </head>
    <body>
<nav class="navbar navbar-fixed-top header">
    <div class="col-md-12">
        <div class="navbar-header">
          
          <a href="#" class="navbar-brand">Bootstrap</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
          <i class="glyphicon glyphicon-search"></i>
          </button>
      
        </div>
       
     </div> 
</nav>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
        <div class="navbar-header">
          
          <a href="#" style="margin-left:15px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Rutas <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
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
             <li class="active"><?php echo Html::a(Yii::t('app','Rutas'), ['../web/site/rutas'], ['class' => 'btn btn-default']); ?></li>
             <li><a href="#logoutModal" role="button" data-toggle="modal">Logout</a></li>
           </ul>
        </div>  
     </div> 
</div>

<!--main-->
<div class="container" id="main">
   <div class="row">
      <div class="panel panel-default">
          
        <div class="panel-body">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#lunes" data-toggle="tab" onclick="initialize('lunes');" >Lunes</a></li>
                  <li><a href="#martes" data-toggle="tab" onclick="initialize('martes');"  >Martes</a></li>
                  <li><a href="#miercoles" data-toggle="tab" onclick="initialize('miercoles');"  >Miercoles</a></li>
                  <li><a href="#jueves" data-toggle="tab" onclick="initialize('jueves');" >Jueves</a></li>
                  <li><a href="#viernes" data-toggle="tab" onclick="initialize('viernes');">Viernes</a></li>
                </ul>
                
                <br>
                 <div class="tabbable">
                  <div class="tab-content">
                    <div class="tab-pane active" id="lunes">
                      <div class="col-sm-6">
                          
                          <div id="googleMap" style="width:300px;height:180px;"></div>
                      </div>
                      <div class="col-sm-4">
                            <div class="btn-group-vertical">
                                <button type="button" class="btn btn-default">Comercio 1</button>
                                <button type="button" class="btn btn-default">Comercio 2</button>
                                <button type="button" class="btn btn-default">Comercio 3</button>
                            </div>
                      </div>
                  </div>
                  <div class="tab-pane" id="martes">
                    <div class="col-sm-6">
                         
                          <div id="googleMapM" style="width:300px;height:180px;"></div>
                      </div>
                      <div class="col-sm-4">
                            <div class="btn-group-vertical">
                                <button type="button" class="btn btn-default">Comercio 1</button>
                                <button type="button" class="btn btn-default">Comercio 20</button>
                                <button type="button" class="btn btn-default">Comercio 3</button>
                            </div>
                      </div>
                  </div>
                 <div class="tab-pane" id="miercoles">
                    <div class="col-sm-6">
                         
                          <div id="googleMapMI" style="width:300px;height:180px;"></div>
                      </div>
                      <div class="col-sm-4">
                            <div class="btn-group-vertical">
                                <button type="button" class="btn btn-default">Comercio 1</button>
                                <button type="button" class="btn btn-default">Comercio 50</button>
                                <button type="button" class="btn btn-default">Comercio 3</button>
                            </div>
                      </div>
                 </div>
                <div class="tab-pane" id="jueves">
                  <div class="col-sm-6">
                          <div id="googleMapJ" style="width:300px;height:180px;"></div>
                      </div>
                      <div class="col-sm-4">
                            <div class="btn-group-vertical">
                                <button type="button" class="btn btn-default">Comercio 1</button>
                                <button type="button" class="btn btn-default">Comercio 2</button>
                                <button type="button" class="btn btn-default">Comercio 3</button>
                            </div>
                      </div>
                </div>
                <div class="tab-pane" id="viernes">
                  <div class="col-sm-6">
                          <div id="googleMapV" style="width:300px;height:180px;"></div>
                      </div>
                      <div class="col-sm-4">
                            <div class="btn-group-vertical">
                                <button type="button" class="btn btn-default">Comercio 1</button>
                                <button type="button" class="btn btn-default">Comercio 2</button>
                                <button type="button" class="btn btn-default">Comercio 3</button>
                            </div>
                      </div>
                </div>
                </div> <!-- /tabbable -->
              </div>
            </div>
         </div> 
    </div>
  </div><!--/row-->
  
  <hr>
    <br>
    
    <div class="clearfix"></div>
      
    <hr>
    <div class="col-md-12 text-center"><p><a href="http://www.bootply.com/download/90113" target="_ext">Download Google Plus Style Template</a><br><a href="http://bootply.com/templates" target="_ext">More Bootstrap Templates by @Bootply</a></p></div>
    <hr>
    
  </div>
</div><!--/main-->

<!--login modal-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"><br>Login</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
          </div>    
      </div>
  </div>
  </div>
</div>



    <!-- script references -->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
   <script src="js/prettify/prettify.js"></script>
   <script
     src="http://maps.googleapis.com/maps/api/js">
   </script>
   <script type="text/javascript">

  var idUsuario = <?php if(!empty($_SESSION['miSession']['id'])){ echo json_encode($_SESSION['miSession']['id']);}?>; 
  var conjuntoComercios = <?php echo json_encode($comercios);?>;
  var rutaDeComercios = Array();
  var longitudConjuntoComercios = conjuntoComercios.length;
  var longitudComercios = 0;
  var id = 0;
   function initialize(diaDeRuta) {
 
      $.get('<?= Yii::$app->urlManager->createUrl("site/getcomerciobyruta")?>'+'?usuario='+idUsuario+ "&" + 'dia=' +diaDeRuta, function( data ){
          longitudComercios=data.length;
          alert(data);  
          alert(conjuntoComercios); 

          for (var i = 0; i < longitudComercios; i++) {
          id =data[i]['idComercio'];
            for (var j = 0; j < longitudConjuntoComercios; j++) {
              if(conjuntoComercios[j]['idComercio']==id){
                rutaDeComercios.push(conjuntoComercios[j]);

                  alert(conjuntoComercios[j]['idComercio']);
                  //                  $('#btn-group-vertical').append('<li><label id=nomProd>'+conjuntoComercios[j]['nombre']+'</label><input class=form-control pull-right col-md-6 col-sm-6 placeholder=Ingrese cantidad id=producto></input> </li>');

              }
            }
          }
           
        });

    var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,  
    mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
    var map=new google.maps.Map(document.getElementById("googleMapM"), mapProp);
    var map=new google.maps.Map(document.getElementById("googleMapMI"), mapProp);
    var map=new google.maps.Map(document.getElementById("googleMapJ"), mapProp);
    var map=new google.maps.Map(document.getElementById("googleMapV"), mapProp);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script>
      // Activate Google Prettify in this page
      addEventListener('load', prettyPrint, false);
    
      $(document).ready(function(){

        // Add prettyprint class to pre elements
          $('pre').addClass('prettyprint');
                
      }); // end document.ready


    </script>
    </body>
</html>



</div>
