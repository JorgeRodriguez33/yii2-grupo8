<?php
 
namespace api\modules\v1\controllers;
 
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

use Yii;
use dektrium\user\models\LoginForm;
use dektrium\user\models\User;

class UserController extends ActiveController
{
    public $modelClass = "dektrium\user\models\User";
    

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['login']);
        return $actions;
    }


    public function actionLogin(){
       $l = $_POST['username'];
        console.log($l);

       /*  $model = new LoginForm();
 
         if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
            return ['access_token' => Yii::$app->user->identity->getAuthKey()];
         } else {
            $model->validate();
            return $model;
         }*/
         return "KAAKAK";
    }

}