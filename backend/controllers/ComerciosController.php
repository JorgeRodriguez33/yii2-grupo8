<?php

namespace backend\controllers;

use Yii;
use backend\models\Comercios;
use backend\models\search\ComerciosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Stock;
use yii\helpers\ArrayHelper;
use backend\models\Productos;
/**
 * ComerciosController implements the CRUD actions for Comercios model.
 */
class ComerciosController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Comercios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComerciosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comercios model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comercios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {      
        $model = new Comercios();
        if ($model->load(Yii::$app->request->post())){

        $cantProd = count($model->productos);  
             
             $productos = ArrayHelper::map(Productos::find()->all(), 'idProd', 'nombre');
            /*se crea el stock inicial para el comercio*/
            for($i = 0 ; $i<$cantProd; $i++) {
                $id = $model->productos[$i];
                $modelStock = new Stock();
                $modelStock->nombreComercio = $model->nombre;
                $modelStock->cantidadEnStock = 0;
                $modelStock->nombreProducto = $productos[$id];
                $modelStock->save();
            }

         $address = urlencode($model->direccion);
         $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
         $response = file_get_contents($url);
         $json = json_decode($response,true);
        if ($json['status'] == 'ZERO_RESULTS') {
            return array();
        }
         $model->latitud =/*-55.895994;*/json_encode($json['results'][0]['geometry']['location']['lat']);
         $model->longitud =/*-34.346712;*/json_encode($json['results'][0]['geometry']['location']['lng']);
            
            if($model->save()){
             return $this->redirect(['view', 'id' => $model->idComercio]);
            }
        }   
         else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Comercios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
         $address = urlencode($model->direccion);
         $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
         $response = file_get_contents($url);
         $json = json_decode($response,true);
        if ($json['status'] == 'ZERO_RESULTS') {
            return array();
        }
         $model->latitud =/*-55.895994;*/json_encode($json['results'][0]['geometry']['location']['lat']);
         $model->longitud =/*-34.346712;*/json_encode($json['results'][0]['geometry']['location']['lng']);
            
            if($model->save()){
 return $this->redirect(['view', 'id' => $model->idComercio]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Comercios model.
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
     * Finds the Comercios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comercios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comercios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">
</script>
<script type="text/javascript">



var lat="-96.895994";
var lon="-34.346712";

</script>
