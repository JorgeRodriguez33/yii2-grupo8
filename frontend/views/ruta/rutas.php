<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Rutas;
use yii\helpers\Json;

?>

<div class="ruta-rutas">

<?php
 echo "<h4>Rutas del relevador <small>";
    echo '</small></h4>';
    echo '<table>';
    $longitud = count($ruta);
    for($i=0; $i<$longitud; $i++)
    {
       $id = $ruta[$i]["idRuta"];
       echo"<br>";
        echo Html::a(Yii::t('app',$ruta[$i]["diaDeRelevamiento"]), ['../web/ruta/view?id='.$id], ['class' => 'btn btn-default']);
    echo"</br>";
}
    echo '</table>';


?>

</div>

