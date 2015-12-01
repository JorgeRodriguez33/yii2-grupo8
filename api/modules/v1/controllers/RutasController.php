<?php
 
namespace api\modules\v1\controllers;
 
use yii\rest\ActiveController;
use backend\models\Relevadores;
use yii\helpers\ArrayHelper;
use Yii;
use yii\helpers\Json;
use backend\models\Rutas;
class RutasController extends ActiveController
{
    public $modelClass = "backend\models\Rutas";



    public function actionGetruta($id){

      $array = Array();
      $array = explode('-', $id); 

    	$ruta = array();
        $conjuntoRutas = ArrayHelper::toArray(Rutas::find()->all());
        $conjuntoRelevadores = ArrayHelper::toArray(Relevadores::find()->all());
        
        foreach ($conjuntoRelevadores as $value) {
             if($value["idUsuario"]==$array[0]){
                $Relevador = $value;
             }
         }

        foreach ($conjuntoRutas as $value) {
             if($value["idRelevador"]==$Relevador['idRelevador'] && $value["diaDeRelevamiento"] == $array[1]){
                array_push($ruta, $value);
             }
         }


        return JSON::encode($ruta); 

    }

}