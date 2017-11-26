<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detalle_material_pedido".
 *
 * @property integer $id_dmp
 * @property integer $material_id
 * @property integer $cantidad
 * @property string $costo
 * @property integer $pedido_id
 *
 * @property Materiales $material
 * @property DetalleStand[] $detalleStands
 */
class DetalleMaterialPedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_material_pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'cantidad', 'costo', 'pedido_id'], 'required'],
            [['material_id', 'cantidad', 'pedido_id'], 'integer'],
            [['costo'], 'string', 'max' => 25],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materiales::className(), 'targetAttribute' => ['material_id' => 'id_mate']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dmp' => 'Id Dmp',
            'material_id' => 'Material ID',
            'cantidad' => 'Cantidad',
            'costo' => 'Costo',
            'pedido_id' => 'Pedido ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Materiales::className(), ['id_mate' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleStands()
    {
        return $this->hasMany(DetalleStand::className(), ['detalleMP_id' => 'id_dmp']);
    }
}
