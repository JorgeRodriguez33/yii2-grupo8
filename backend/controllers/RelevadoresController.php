<?php

namespace backend\controllers;

use Yii;
use backend\models\Relevadores;
use backend\models\search\RelevadoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RelevadoresController implements the CRUD actions for Relevadores model.
 */
class RelevadoresController extends Controller
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
     * Lists all Relevadores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RelevadoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Relevadores model.
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
     * Creates a new Relevadores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Relevadores();

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
 return $this->redirect(['view', 'id' => $model->idRelevador]);
            }
        }  else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Relevadores model.
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
 return $this->redirect(['view', 'id' => $model->idRelevador]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Relevadores model.
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
     * Finds the Relevadores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Relevadores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Relevadores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
