<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use common\models\User;
use yii\filters\VerbFilter;
use dektrium\user\Finder;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /** @var Finder */
    protected $finder;
    /**
     * @inheritdoc
     */
    
    /**
     * @param string $id
     * @param \yii\base\Module $module
     * @param Finder $finder
     * @param array $config
     */
    public function __construct($id, $module, Finder $finder, $config = [])
    {
        $this->finder = $finder;
        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','confirmarusuario'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'obtener' => ['get'],
                    'Confirmaruser'=> ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $id = Yii::$app->user->identity->id;
        $profile = $this->finder->findProfileById($id);

        if ($profile === null) {
            throw new NotFoundHttpException;
        }

        $this->view->params['profile'] = $profile;

        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegister()
    {
        return $this->render('signup');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
    /*la confirmacion de un usuario por parte del admin*/
    public function actionConfirmaruser($userName){
        $model = new User();
        $temp="";
        $temp = $model->findByUsername($userName)['created_at'];
        $model->findByUsername($userName)['confirmed_at'] = $temp; 
        $model->save();
        
    }

    /*se  toman todos los usuarios que esperan la confirmacion del admin*/
    public function actionObtener(){
        $conjuntoUsuarios = ArrayHelper::toArray(User::find()->all());
        $cont = 0;
        $arrayNombres = array();
        foreach ($conjuntoUsuarios as $value) {
        if($value['confirmed_at'] == null){
            array_push($arrayNombres, $value['username']);
            }
        }
        echo JSON::encode($arrayNombres);
    }

    public function actionConfirmarusuario(){
     $conjuntoUsuarios = ArrayHelper::toArray(User::find()->all());
     $cont = 0;
     $arrayNombres = array();
     foreach ($conjuntoUsuarios as $value) {
     if($value['confirmed_at'] == null){
        array_push($arrayNombres, $value['username']);
        }
     }
      return $this->render('confirmarusuario', [
                'arrayNombres' => $arrayNombres,
            ]);
    }
}
