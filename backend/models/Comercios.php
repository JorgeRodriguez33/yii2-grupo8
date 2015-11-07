<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comercios".
 *
 * @property integer $idComercio
 * @property string $nombre
 * @property double $latitud
 * @property double $longitud
 * @property integer $prioridad
 * @property string $productos
 * @property string $direccion
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'latitud', 'longitud', 'prioridad', 'productos', 'direccion'], 'required'],
            [['diasParaRelevar'], 'string'],
            [['prioridad'], 'string'],
            [['latitud', 'longitud'], 'number'],
            [['nombre', 'direccion'], 'string', 'max' => 45],
            [['productos'], 'string', 'max' => 300]
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
            'direccion' => Yii::t('app', 'Direccion'),
        ];
    }


    public function beforeValidate()
    {   
        
        if (!is_array($this->productos)) {
            $this->productos = array();
        }
        $this->productos = json_encode($this->productos);

        if (!is_array($this->diasParaRelevar)) {
            $this->diasParaRelevar = array();
        }
        $this->diasParaRelevar = json_encode($this->diasParaRelevar);
       

        return parent::beforeValidate();
    }


   /* public $prod = array();
       public function afterFind()
    {
        parent::afterFind();

        $this->productos = json_decode($this->productos,true);
        if (!is_array($this->productos)) {
            $this->productos = array();
        }
        $this->prod=array();
        if(sizeof($this->productos)) {
            foreach($this->productos as $color) {
                $this->prod[$color]=array( 'selected' => 'selected' );
            }
        }
    }*/

}
