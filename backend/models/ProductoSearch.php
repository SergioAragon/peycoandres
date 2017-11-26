<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Producto;

/**
 * ProductoSearch represents the model behind the search form about `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_producto', 'cod_clasifi', 'unidades', 'estado_id', 'color_id', 'cantidad_color', 'materiales_id'], 'integer'],
            [['nombre', 'dimension_producto', 'costo'], 'safe'],
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
        $query = Producto::find();

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
            'id_producto' => $this->id_producto,
            
            'cod_clasifi' => $this->cod_clasifi,
            'unidades' => $this->unidades,
            'estado_id' => $this->estado_id,
            'color_id' => $this->color_id,
            'cantidad_color' => $this->cantidad_color,
            'materiales_id' => $this->materiales_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'dimension_producto', $this->dimension_producto])
            /*->andFilterWhere(['like', 'imag_adju', $this->imag_adju])*/
            ->andFilterWhere(['like', 'costo', $this->costo]);

        return $dataProvider;
    }
}
