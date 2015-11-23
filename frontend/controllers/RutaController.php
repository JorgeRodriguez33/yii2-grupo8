<?php
namespace frontend\controllers;

use Yii;
use  common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\Relevadores;
use yii\helpers\ArrayHelper;
use backend\models\Rutas;
use backend\models\search\RutasSearch;


class RutaController extends Controller
{

    public function actionRutas($id)
    {   
        $ruta = array();
        $conjuntoRutas = ArrayHelper::toArray(Rutas::find()->all());
        $conjuntoRelevadores = ArrayHelper::toArray(Relevadores::find()->all());
        
        foreach ($conjuntoRelevadores as $value) {
             if($value["idUsuario"]==$id){
                $Relevador = $value;
             }
         }

        foreach ($conjuntoRutas as $value) {
             if($value["idRelevador"]==$Relevador['idRelevador']){
                array_push($ruta, $value);
             }
         }

        return $this->render('rutas', ['ruta' => $ruta]);
    }


    public function actionView($id){
    	$rutaDelDia = array();
        $conjuntoRutas = ArrayHelper::toArray(Rutas::find()->all());

    	 foreach ($conjuntoRutas as $value) {
             if($value["idRuta"]==$id){
                $rutaDelDia = $value;
             }
         }

    	return $this->render('view', ['rutaDelDia' => $rutaDelDia]);
    }







}	





?>