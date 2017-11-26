<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $id_pedido
 * @property string $fecha_pedido
 * @property integer $estado_id
 * @property integer $municipio_id
 * @property string $direccion
 * @property string $medidas
 * @property string $tipo_stand
 *
 * @property Municipio $municipio
 * @property Estado $estado
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pedido', 'fecha_pedido', 'estado_id', 'municipio_id', 'direccion', 'medidas', 'tipo_stand'], 'required'],
            [['id_pedido', 'estado_id', 'municipio_id'], 'integer'],
            [['fecha_pedido'], 'safe'],
            [['direccion', 'medidas', 'tipo_stand'], 'string', 'max' => 20],
            [['municipio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municipio::className(), 'targetAttribute' => ['municipio_id' => 'id_municipio']],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_id' => 'id_estado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pedido' => 'Id Pedido',
            'fecha_pedido' => 'Fecha Pedido',
            'estado_id' => 'Estado ID',
            'municipio_id' => 'Municipio ID',
            'direccion' => 'Direccion',
            'medidas' => 'Medidas',
            'tipo_stand' => 'Tipo Stand',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['id_municipio' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['id_estado' => 'estado_id']);
    }
}
