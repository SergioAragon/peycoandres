<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cotizacion".
 *
 * @property integer $id_cotizacion
 * @property integer $cliente_id
 * @property integer $producto_id
 * @property string $fecha
 *
 * @property Clientes $cliente
 * @property Producto $producto
 * @property DetalleCotizacionProductos[] $detalleCotizacionProductos
 */
class Cotizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cotizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cotizacion', 'cliente_id', 'producto_id', 'fecha'], 'required'],
            [['id_cotizacion', 'cliente_id', 'producto_id'], 'integer'],
            [['fecha'], 'safe'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['cliente_id' => 'id_clientes']],
            [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id' => 'id_producto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cotizacion' => 'Id Cotizacion',
            'cliente_id' => 'Cliente ID',
            'producto_id' => 'Producto ID',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['id_clientes' => 'cliente_id']);
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
    public function getDetalleCotizacionProductos()
    {
        return $this->hasMany(DetalleCotizacionProductos::className(), ['cotizacion_id' => 'id_cotizacion']);
    }
}
