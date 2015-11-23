<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "productos".
 *
 * @property integer $idProd
 * @property string $nombre
 * @property string $imagen
 * @property integer $idCat
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'imagen', 'idCat'], 'required'],
          //  [['imagen'], 'string', 'max' => 600],
            [['imagen'], 'safe'],
            [['imagen'], 'file', 'extensions'=>'jpg, gif, png'],
            [['idCat'], 'integer'],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProd' => Yii::t('app', 'Id Prod'),
            'nombre' => Yii::t('app', 'Nombre'),
            'imagen' => Yii::t('app', 'Imagen'),
            'idCat' => Yii::t('app', 'Id Cat'),
        ];
    }
    
}