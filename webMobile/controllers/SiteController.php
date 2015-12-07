<?php
namespace webMobile\controllers;

use Yii;
use  common\models\LoginForm;
use webMobile\models\PasswordResetRequestForm;
use webMobile\models\ResetPasswordForm;
use webMobile\models\SignupForm;
use webMobile\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Comercios; 
use backend\models\Productos; 
use backend\models\Stock; 

use backend\models\Relevadores;
use yii\helpers\ArrayHelper;
use backend\models\Rutas;
use yii\helpers\Json;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['register'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'getsession' => ['post'],
                    'getrutaindex' => ['post'],
                    'getcomerciobyruta'=> ['get'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionOut()
    {
        session_start();
        session_destroy();

         return $this->redirect(['index']);
    }

    public function actionGetrutaindex($datos){

         return $this->redirect(['index'], ['datos' => $datos]); 
    }

    public function actionGetcomerciobyruta($usuario,$dia){

     $response = file_get_contents('http://localhost/yii2-grupo8/api/web/v1/apimobile/ruta/'.$usuario.'-'.$dia);
     $arrayRuta = Array();
     $arrayRuta = explode('[', json_decode($response)); 

     $arrayRuta = explode(']', $arrayRuta[2]); 
     $arrayRuta = explode(',', $arrayRuta[0]); 

     echo JSON::encode($arrayRuta);
    }


    public function actionGetsession($nom)
    {
        session_start();
        
      $i=0;
      $array = Array();
      $array = explode('"', $nom); 
        foreach ($array as $value) {
            if( $value!=':'){
                if($value != 'accessToken'){
                    if( $value!='NameUser'){
                       if($value != 'idUser'){
                            $arrayProd[$i] = $value;
                           }
                        }
                    }
                }
                $i++;
    }

      $idUsu = explode(':', $array[10]);
      $idUsu = explode('}', $idUsu[1]);

    $miSession = array('id'=>$idUsu[0],
                       'nombre'=>$array[7]);
       
        $_SESSION['miSession'] =  $miSession;

    /*preparo la ruta del ida para esta session */

    $arrayDias = array('domingo','lunes','martes',
       'miercoles','jueves','viernes','sabado');
    $dia = $arrayDias[date("w")];

     $response = file_get_contents('http://localhost/yii2-grupo8/api/web/v1/apimobile/ruta/'.$idUsu[0].'-'.$dia);

     if(empty($response) == false){
     $arrayRuta = Array();
     $arrayRuta = explode('[', json_decode($response)); 

     $arrayRuta = explode(']', $arrayRuta[2]); 
     $arrayRuta = explode(',', $arrayRuta[0]); 

        $_SESSION['comerciosDelDia'] =  $arrayRuta;
      } 
      else{
         $_SESSION['sinComreciosParaHoy'] = array('mensaje'=>'El relevador no tiene rutas para este dia...');
      }
        return $this->redirect(['index']);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPedido($id)
    {
        $comercioPedido = Array();
        $arratIdProd = Array();
        $arratId = Array();
        $arrayNombresProductos = array();

        $conjuntoComercios= ArrayHelper::toArray(Comercios::find()->all());
        $conjuntoProductos= ArrayHelper::toArray(Productos::find()->all());

        foreach ($conjuntoComercios as $value) {
          if($value['idComercio'] == $id){
            $comercioPedido = $value;
            $nomComercio = $value['nombre'];
          }
        }

        $arratIdProd = $comercioPedido['productos'];
        $arratIdProd =  explode('"', $arratIdProd);  

        $i=0;
        foreach ($arratIdProd as $value) {
            if( $value!=':'){
                if($value != '['){
                    if( $value!=','){
                       if($value != ']'){
                            $arratId[$i] = $value;
                        }
                    }
               }
            }
         $i++;
        }

        //me queda hacer el foreach siguiente pero que por cada value pregunte si su idProd existe dentro del pajar arratIdProd y asi voy sacando los nombres de los productos
        foreach ($conjuntoProductos as $value) {
          if(in_array($value['idProd'],$arratId)){
           array_push($arrayNombresProductos, $value['nombre']);
          }
        }

       return $this->render('pedido', ['comercioPedido' => $arrayNombresProductos, 'nombreComercio' => $nomComercio, "idComercio"=> $id]);
    }

    public function actionStock($id)
    {

        $idStockDeComercio = Array();
        $arrayNombresProductos = array();
        $cantStockDeComercio = array();


        $conjuntoComercios= ArrayHelper::toArray(Comercios::find()->all());
        $conjuntoStock= ArrayHelper::toArray(Stock::find()->all());

        foreach ($conjuntoComercios as $value) {
          if($value['idComercio'] == $id){
            $nomComercio = $value['nombre'];
          }
        }

        foreach ($conjuntoStock as $value) {
         if($value['nombreComercio'] == $nomComercio){
            array_push($arrayNombresProductos, $value['nombreProducto']);//obtengo los nombres de los productos del stock de ese comercio
            array_push($idStockDeComercio, $value['idStock']);
            array_push($cantStockDeComercio, $value['cantidadEnStock']);
         }
        }


       return $this->render('stock', ['comerciostock' => $arrayNombresProductos, 'nombreComercio' => $nomComercio, 'idStockDeComercio' =>$idStockDeComercio,'cantStockDeComercio' => $cantStockDeComercio]);
    }



    public function actionLogin()
    {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
             
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }

      }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
