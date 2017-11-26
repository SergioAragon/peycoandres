<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_documento".
 *
 * @property integer $id_tipodoc
 * @property string $descripcion
 *
 * @property Clientes[] $clientes
 */
class TipoDocumento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_documento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipodoc', 'descripcion'], 'required'],
            [['id_tipodoc'], 'integer'],
            [['descripcion'], 'string', 'max' => 20],
        ];
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipodoc' => 'Id Tipodoc',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Clientes::className(), ['documento_id' => 'id_tipodoc']);
    }

}
