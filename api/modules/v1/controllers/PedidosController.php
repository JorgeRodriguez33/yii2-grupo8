<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;

/**

 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class PedidosController extends ActiveController
{
    public $modelClass = 'backend\models\Pedidos';    


	public function actionSavepedido()
	{
	  
	    
	    return "ok";
	}

	
}


