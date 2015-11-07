<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Relevadores;

/**
 * RelevadoresSearch represents the model behind the search form about `backend\models\Relevadores`.
 */
class RelevadoresSearch extends Relevadores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRelevador', 'kmARecorrer'], 'integer'],
            [['nombre', 'correo', 'direccion'], 'safe'],
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
        $query = Relevadores::find();

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
            'idRelevador' => $this->idRelevador,
            'kmARecorrer' => $this->kmARecorrer,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        return $dataProvider;
    }
}
