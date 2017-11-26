<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Materiales;

/**
 * MaterialesSearch represents the model behind the search form about `app\models\Materiales`.
 */
class MaterialesSearch extends Materiales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mate'], 'integer'],
            [['nombre'], 'safe'],
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
        $query = Materiales::find();

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
            'id_mate' => $this->id_mate,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
