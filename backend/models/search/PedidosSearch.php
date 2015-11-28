<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pedidos;

/**
 * PedidosSearch represents the model behind the search form about `backend\models\Pedidos`.
 */
class PedidosSearch extends Pedidos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPedido', 'nombreProducto', 'cantidad'], 'integer'],
            [['nombreComercio'], 'safe'],
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
        $query = Pedidos::find();

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
            'idPedido' => $this->idPedido,
            'nombreProducto' => $this->nombreProducto,
            'cantidad' => $this->cantidad,
        ]);

        $query->andFilterWhere(['like', 'nombreComercio', $this->nombreComercio]);

        return $dataProvider;
    }
}
