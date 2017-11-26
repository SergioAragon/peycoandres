<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetalleFase;

/**
 * DetalleFaseSearch represents the model behind the search form about `app\models\DetalleFase`.
 */
class DetalleFaseSearch extends DetalleFase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_df', 'fase_id', 'estado_id'], 'integer'],
            [['fecha_e', 'fecha_s', 'fecha_cambioF'], 'safe'],
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
        $query = DetalleFase::find();

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
            'id_df' => $this->id_df,
            'fecha_e' => $this->fecha_e,
            'fecha_s' => $this->fecha_s,
            'fecha_cambioF' => $this->fecha_cambioF,
            'fase_id' => $this->fase_id,
            'estado_id' => $this->estado_id,
        ]);

        return $dataProvider;
    }
}
