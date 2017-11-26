<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property integer $id_estado
 * @property string $descripcion
 *
 * @property DetalleFase[] $detalleFases
 * @property DetalleProductoColor[] $detalleProductoColors
 * @property DetalleProductoMaterial[] $detalleProductoMaterials
 * @property DetalleStand[] $detalleStands
 * @property Empleado[] $empleados
 * @property Pedido[] $pedidos
 * @property Producto[] $productos
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado', 'descripcion'], 'required'],
            [['id_estado'], 'integer'],
            [['descripcion'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id Estado',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleFases()
    {
        return $this->hasMany(DetalleFase::className(), ['estado_id' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleProductoColors()
    {
        return $this->hasMany(DetalleProductoColor::className(), ['estado_id' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleProductoMaterials()
    {
        return $this->hasMany(DetalleProductoMaterial::className(), ['estado_id' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleStands()
    {
        return $this->hasMany(DetalleStand::className(), ['estado_id' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['estado_id' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['estado_id' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['estado_id' => 'id_estado']);
    }
}
