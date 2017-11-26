<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetalleStand;

/**
 * DetalleStandSearch represents the model behind the search form about `app\models\DetalleStand`.
 */
class DetalleStandSearch extends DetalleStand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ds', 'detalleMP_id', 'producto_id', 'estado_id', 'cantidades'], 'integer'],
            [['precio_total'], 'safe'],
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
        $query = DetalleStand::find();

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
            'id_ds' => $this->id_ds,
            'detalleMP_id' => $this->detalleMP_id,
            'producto_id' => $this->producto_id,
            'estado_id' => $this->estado_id,
            'cantidades' => $this->cantidades,
        ]);

        $query->andFilterWhere(['like', 'precio_total', $this->precio_total]);

        return $dataProvider;
    }
}
