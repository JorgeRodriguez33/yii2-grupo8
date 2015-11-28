<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pedidos".
 *
 * @property integer $idPedido
 * @property string $nombreComercio
 * @property integer $nombreProducto
 * @property integer $cantidad
 */
class Pedidos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedidos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreComercio', 'nombreProducto', 'cantidad'], 'required'],
            [['nombreProducto', 'cantidad'], 'integer'],
            [['nombreComercio'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPedido' => Yii::t('app', 'Id Pedido'),
            'nombreComercio' => Yii::t('app', 'Nombre Comercio'),
            'nombreProducto' => Yii::t('app', 'Nombre Producto'),
            'cantidad' => Yii::t('app', 'Cantidad'),
        ];
    }
}
