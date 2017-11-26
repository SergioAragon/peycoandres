<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detalle_stand".
 *
 * @property integer $id_ds
 * @property integer $detalleMP_id
 * @property integer $producto_id
 * @property integer $estado_id
 * @property string $precio_total
 * @property integer $cantidades
 *
 * @property Agenda[] $agendas
 * @property Estado $estado
 * @property DetalleMaterialPedido $detalleMP
 * @property Producto $producto
 * @property DetalleStandProducto[] $detalleStandProductos
 */
class DetalleStand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_stand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ds', 'detalleMP_id', 'producto_id', 'estado_id', 'precio_total', 'cantidades'], 'required'],
            [['id_ds', 'detalleMP_id', 'producto_id', 'estado_id', 'cantidades'], 'integer'],
            [['precio_total'], 'string', 'max' => 20],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_id' => 'id_estado']],
            [['detalleMP_id'], 'exist', 'skipOnError' => true, 'targetClass' => DetalleMaterialPedido::className(), 'targetAttribute' => ['detalleMP_id' => 'id_dmp']],
            [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id' => 'id_producto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ds' => 'Id Ds',
            'detalleMP_id' => 'Detalle Mp ID',
            'producto_id' => 'Producto ID',
            'estado_id' => 'Estado ID',
            'precio_total' => 'Precio Total',
            'cantidades' => 'Cantidades',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendas()
    {
        return $this->hasMany(Agenda::className(), ['standD_id' => 'id_ds']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['id_estado' => 'estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleMP()
    {
        return $this->hasOne(DetalleMaterialPedido::className(), ['id_dmp' => 'detalleMP_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id_producto' => 'producto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleStandProductos()
    {
        return $this->hasMany(DetalleStandProducto::className(), ['ds_id' => 'id_ds']);
    }
}
