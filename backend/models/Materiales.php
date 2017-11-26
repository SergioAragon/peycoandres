<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "materiales".
 *
 * @property integer $id_mate
 * @property string $nombre
 *
 * @property DetalleMaterialDetalleStand[] $detalleMaterialDetalleStands
 * @property DetalleProductoMaterial[] $detalleProductoMaterials
 * @property Producto[] $productos
 */
class Materiales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materiales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mate', 'nombre'], 'required'],
            [['id_mate'], 'integer'],
            [['nombre'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mate' => 'Id Mate',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleMaterialDetalleStands()
    {
        return $this->hasMany(DetalleMaterialDetalleStand::className(), ['materiales_id' => 'id_mate']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleProductoMaterials()
    {
        return $this->hasMany(DetalleProductoMaterial::className(), ['materiales_id' => 'id_mate']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['materiales_id' => 'id_mate']);
    }
}
