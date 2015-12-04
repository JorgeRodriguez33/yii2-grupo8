<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property integer $idStock
 * @property string $nombreComercio
 * @property string $nombreProducto
 * @property integer $cantidadEnStock
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreComercio', 'nombreProducto', 'cantidadEnStock'], 'required'],
            [['cantidadEnStock'], 'integer'],
            [['nombreComercio', 'nombreProducto'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idStock' => Yii::t('app', 'Id Stock'),
            'nombreComercio' => Yii::t('app', 'Nombre Comercio'),
            'nombreProducto' => Yii::t('app', 'Nombre Producto'),
            'cantidadEnStock' => Yii::t('app', 'Cantidad En Stock'),
        ];
    }
}
