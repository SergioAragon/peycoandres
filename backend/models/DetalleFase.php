<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detalle_fase".
 *
 * @property integer $id_df
 * @property string $fecha_e
 * @property string $fecha_s
 * @property string $fecha_cambioF
 * @property integer $fase_id
 * @property integer $estado_id
 *
 * @property Agenda[] $agendas
 * @property Estado $estado
 * @property Fase $fase
 */
class DetalleFase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_fase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_e', 'fecha_s', 'fecha_cambioF', 'fase_id', 'estado_id'], 'required'],
            [['fecha_e', 'fecha_s', 'fecha_cambioF'], 'safe'],
            [['fase_id', 'estado_id'], 'integer'],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_id' => 'id_estado']],
            [['fase_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fase::className(), 'targetAttribute' => ['fase_id' => 'id_fase']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_df' => 'Id Df',
            'fecha_e' => 'Fecha E',
            'fecha_s' => 'Fecha S',
            'fecha_cambioF' => 'Fecha Cambio F',
            'fase_id' => 'Fase ID',
            'estado_id' => 'Estado ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendas()
    {
        return $this->hasMany(Agenda::className(), ['detalleF_id' => 'id_df']);
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
    public function getFase()
    {
        return $this->hasOne(Fase::className(), ['id_fase' => 'fase_id']);
    }
}
