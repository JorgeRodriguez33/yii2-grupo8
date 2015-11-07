<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rutas".
 *
 * @property integer $idRuta
 * @property integer $idRelevador
 * @property string $ordenComercios
 */
class Rutas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rutas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRelevador', 'ordenComercios'], 'required'],
            [['idRelevador'], 'integer'],
            [['ordenComercios'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idRuta' => Yii::t('app', 'Id Ruta'),
            'idRelevador' => Yii::t('app', 'Id Relevador'),
            'ordenComercios' => Yii::t('app', 'Orden Comercios'),
        ];
    }
}
