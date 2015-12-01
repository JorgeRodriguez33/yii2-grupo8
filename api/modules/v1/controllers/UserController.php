<?php
 
namespace api\modules\v1\controllers;
 
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

use Yii;
use common\models\LoginForm;
use dektrium\user\models\User;
use yii\helpers\Json;

class UserController extends ActiveController
{
    public $modelClass = "common\models\LoginForm";

    public function actionLogin(){

        $model = new LoginForm();
         if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
        //    return Yii::$app->user->identity->getAuthKey();
        //    return ApiResponse::reponseWithStatus(['accessToken' => Yii::$app->user->identity->getAuthKey(), 'NameUser' => Yii::$app->user->identity->username, 'NameUser' => Yii::$app->user->identity->id]);
         return ApiResponse::reponseWithStatus(['accessToken' => Yii::$app->user->identity->getAuthKey(), 'NameUser' => Yii::$app->user->identity->username, 'idUser' => Yii::$app->user->identity->id]);

         } else {
            
            return ApiResponse::reponseWithStatus(Yii::$app->getRequest()->getBodyParams(), 403);
         }
    }

}

class ApiResponse {

    public static function reponseWithStatus($data, $status = 200){
        Yii::$app->response->statusCode = $status;
        return JSON::encode($data);
    }

}

