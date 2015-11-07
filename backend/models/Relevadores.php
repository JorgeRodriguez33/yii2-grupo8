<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "relevadores".
 *
 * @property integer $idRelevador
 * @property string $nombre
 * @property integer $kmARecorrer
 * @property string $correo
 * @property string $latitud
 * @property string $longitud
 * @property string $direccion
 */
class Relevadores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relevadores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'kmARecorrer', 'correo', 'latitud', 'longitud', 'direccion'], 'required'],
            [['kmARecorrer'], 'integer'],
            [['latitud', 'longitud'], 'number'],
            [['nombre'], 'string', 'max' => 45],
            [['correo'], 'string', 'max' => 255],
            [['direccion'], 'string', 'max' => 65]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idRelevador' => Yii::t('app', 'Id Relevador'),
            'nombre' => Yii::t('app', 'Nombre'),
            'kmARecorrer' => Yii::t('app', 'Km Arecorrer'),
            'correo' => Yii::t('app', 'Correo'),
            'latitud' => Yii::t('app', 'Latitud'),
            'longitud' => Yii::t('app', 'Longitud'),
            'direccion' => Yii::t('app', 'Direccion'),
        ];
    }
}
