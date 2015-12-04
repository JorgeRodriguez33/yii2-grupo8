<?php

namespace backend\controllers;

use Yii;
use backend\models\Rutas;
use backend\models\search\RutasSearch;
use backend\models\Comercios;
use backend\models\search\ComerciosSearch;
use backend\models\Relevadores;
use backend\models\search\RelevadoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * RutasController implements the CRUD actions for Rutas model.
 */
class RutasController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'comerciosautomatic' => ['get'],
                    'comerciosmanual' => ['get'],
                    'obtenernombrecomercios' => ['get'],
                    'nombrecomerciosmanual' =>['get'],
                    'getcomercios' =>['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all Rutas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RutasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rutas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionGetcomercios($nom)
    {

      $conjuntoComercios = ArrayHelper::toArray(Comercios::find()->all());
      $arrayIdComercios = Array();
      $i = 0;
      $array = Array();
      $array = explode(',', $nom); 
        foreach ($array as $value) {
                    if( $value!=','){
                    $arrayProd[$i] = $value;
                    $i++;
                    }
        }
       /* foreach ($conjuntoComercios as $value) {
          if(in_array($value['nombre'],$array)){
            array_push($arrayIdComercios,$value['idComercio']);
          }
        }*/

        foreach ($array as $value) {
            foreach ($conjuntoComercios as $value2){
              if($value==$value2['nombre']){
                 array_push($arrayIdComercios,$value2['idComercio']);
              }
            }
        }

        echo JSON::encode($arrayIdComercios);
   
     }

    /**
     * Creates a new Rutas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rutas();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->idRuta]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Rutas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idRuta]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rutas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rutas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rutas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rutas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


     
    
    
    //Para crear Rutas Manuales

    public function actionNombrecomerciosmanual(){

      $comerciosParaRelevar = array();
      $conjuntoComercios = ArrayHelper::toArray(Comercios::find()->all());
     
      foreach ($conjuntoComercios as $value) {
        array_push($comerciosParaRelevar, $value['nombre']);
      }

       echo JSON::encode($comerciosParaRelevar);
    }

    public function actionComerciosmanual($id){
 
          return "proximamente...";
    }
    
    //para crear Rutas Automaticas

    public function actionComerciosautomatic($dia,$id){
     
        $Relevador = array();
        $comerciosParaRelevar = array();
        

        $conjuntoComercios = ArrayHelper::toArray(Comercios::find()->all()); //todos los comercios de la db
        $conjuntoRelevadores = ArrayHelper::toArray(Relevadores::find()->all()); //todos los relevadores de la db


      

         //obtengo el relevador que seleccione en el dropdownlist
         foreach ($conjuntoRelevadores as $value) {
             if($value["idRelevador"]==$id){
                $Relevador = $value;
             }
         }
         
      $distanciaMayorActual = 0;
      foreach ($conjuntoComercios as $value) {

      $latitudeFrom =$Relevador['latitud'];
      $longitudeFrom =$Relevador['longitud'];
      $latitudeTo = $value['latitud'];
      $longitudeTo = $value['longitud'];

      $theta = $longitudeFrom - $longitudeTo;
      $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $distancia= ($miles * 1.609344).'km';


    if($distancia <= $Relevador['kmARecorrer']){
      $kk = array();
      $kk = json_decode($value['diasParaRelevar']);
          foreach ( $kk as $value2) {
            if($value2 == $dia){
             array_push($comerciosParaRelevar, $value['idComercio']);
            }
         }

    }
        }
          echo JSON::encode($comerciosParaRelevar);
       
    }

    public function actionObtenernombrecomercios($dia,$id){

      $Relevador = array();
      $comerciosParaRelevar = array();
      $buleano = true;

      $conjuntoComercios = ArrayHelper::toArray(Comercios::find()->all()); //todos los comercios de la db
      $conjuntoRelevadores = ArrayHelper::toArray(Relevadores::find()->all()); //todos los relevadores de la db
      $conjuntoRutas = ArrayHelper::toArray(Rutas::find()->all());

        foreach ($conjuntoRutas as $value) {
          if($value["idRelevador"]==$id && $value['diaDeRelevamiento']==$dia){
            $buleano = false;
          }
        }

        if($buleano == true){

         //obtengo el relevador que seleccione en el dropdownlist
         foreach ($conjuntoRelevadores as $value) {
             if($value["idRelevador"]==$id){
                $Relevador = $value;
             }
         }
         
      $distanciaMayorActual = 0;
      foreach ($conjuntoComercios as $value) {
        
      $latitudeFrom =$Relevador['latitud'];
      $longitudeFrom =$Relevador['longitud'];
      $latitudeTo = $value['latitud'];
      $longitudeTo = $value['longitud'];

      $theta = $longitudeFrom - $longitudeTo;
      $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $distancia= ($miles * 1.609344).'km';


      if($distancia <= $Relevador['kmARecorrer']){
        $kk = array();
        $kk = json_decode($value['diasParaRelevar']);
          foreach ( $kk as $value2) {
            if($value2 == $dia){
             array_push($comerciosParaRelevar, $value['nombre']);
            }
         }

      }
    }

      if(empty($comerciosParaRelevar)){
            return "no existen comercios que esten dentro del rango de recorrido del relevador o de dias para relevarlo...";
      }else{
            echo JSON::encode($comerciosParaRelevar);
           }
    }      
    else{
        return "Ya existe una ruta para este relevador este dia";
        }  
    }
}


?>





