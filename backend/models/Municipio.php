<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property integer $id_municipio
 * @property string $descripcion
 * @property integer $departamento_id
 *
 * @property Departamento $departamento
 * @property Pedido[] $pedidos
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'departamento_id'], 'required'],
            [['departamento_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 20],
            [['departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['departamento_id' => 'id_departamento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_municipio' => 'Id Municipio',
            'descripcion' => 'Descripcion',
            'departamento_id' => 'Departamento ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['id_departamento' => 'departamento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['municipio_id' => 'id_municipio']);
    }
}
