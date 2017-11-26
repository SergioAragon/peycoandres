<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetalleMaterialPedido;

/**
 * DetalleMaterialPedidoSearch represents the model behind the search form about `app\models\DetalleMaterialPedido`.
 */
class DetalleMaterialPedidoSearch extends DetalleMaterialPedido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dmp', 'material_id', 'cantidad', 'pedido_id'], 'integer'],
            [['costo'], 'safe'],
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
        $query = DetalleMaterialPedido::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_dmp' => $this->id_dmp,
            'material_id' => $this->material_id,
            'cantidad' => $this->cantidad,
            'pedido_id' => $this->pedido_id,
        ]);

        $query->andFilterWhere(['like', 'costo', $this->costo]);

        return $dataProvider;
    }
}
