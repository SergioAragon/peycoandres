<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_producto".
 *
 * @property integer $id_tp
 * @property string $descripcion
 *
 * @property Producto[] $productos
 */
class TipoProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tp', 'descripcion'], 'required'],
            [['id_tp'], 'integer'],
            [['descripcion'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tp' => 'Id Tp',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasMany(Producto::className(), ['cod_tipo' => 'id_tp']);
    }
}
