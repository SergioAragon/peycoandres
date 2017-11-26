<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "color".
 *
 * @property integer $id_color
 * @property string $nombre
 * @property string $num_color
 *
 * @property DetalleProductoColor[] $detalleProductoColors
 * @property Producto[] $productos
 */
class Color extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_color', 'nombre', 'num_color'], 'required'],
            [['id_color'], 'integer'],
            [['nombre', 'num_color'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_color' => 'Id Color',
            'nombre' => 'Nombre',
            'num_color' => 'Num Color',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleProductoColors()
    {
        return $this->hasMany(DetalleProductoColor::className(), ['color_id' => 'id_color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['color_id' => 'id_color']);
    }
}
