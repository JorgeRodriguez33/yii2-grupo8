<?php

namespace backend\models;

use Yii;
use yii\helpers\BaseJson;

/**
 * This is the model class for table "comercios".
 *
 * @property integer $idComercio
 * @property string $nombre
 * @property string $latitud
 * @property string $longitud
 * @property integer $prioridad
 * @property string $productos
 */
class Comercios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comercios';
    }

    public $prod;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'latitud', 'longitud', 'prioridad', 'productos'], 'required'],
            [['latitud', 'longitud'], 'number'],
            [['prioridad'], 'integer'],
            [['nombre'], 'string', 'max' => 45]
            //[['productos'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComercio' => Yii::t('app', 'Id Comercio'),
            'nombre' => Yii::t('app', 'Nombre'),
            'latitud' => Yii::t('app', 'Latitud'),
            'longitud' => Yii::t('app', 'Longitud'),
            'prioridad' => Yii::t('app', 'Prioridad'),
            'productos' => Yii::t('app', 'Productos'),
        ];
    }

    //crea un array vacio y lo llena con los productos seleccionados
        public function beforeValidate()
    {
        if (!is_array($this->productos)) {
            $this->productos = array();
        }
        $this->productos = json_encode($this->productos);

        return parent::beforeValidate();
    }

  

}
