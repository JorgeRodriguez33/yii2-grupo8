<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Comercios;

/**
 * ComerciosSearch represents the model behind the search form about `backend\models\Comercios`.
 */
class ComerciosSearch extends Comercios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idComercio', 'prioridad'], 'integer'],
            [['nombre', 'productos'], 'safe'],
            [['latitud', 'longitud'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Comercios::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idComercio' => $this->idComercio,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'prioridad' => $this->prioridad,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);
           // ->andFilterWhere(['like', 'productos', $this->productos]);

        return $dataProvider;
    }
}
