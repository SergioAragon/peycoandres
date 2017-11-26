<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "clasificacion".
 *
 * @property integer $id_clasifi
 * @property string $descripcion
 * @property integer $Parent_id
 *
 * @property Producto[] $productos
 */
class Clasificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clasificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_clasifi', 'descripcion', 'Parent_id'], 'required'],
            [['id_clasifi', 'Parent_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_clasifi' => 'Id Clasifi',
            'descripcion' => 'Descripcion',
            'Parent_id' => 'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['cod_clasifi' => 'id_clasifi']);
    }

public function getClasifBy($parentid= 0)
{
$data = Clasificacion::find()->asArray()->where('parent_id=:parentid',['parentid'=>$parentid])->all();
return $data;
}


public function getDataTabHomePage($parentid= 0, $limit=6)
{
    $data = Clasificacion::find()->asArray()->where('parent_id!=:parentid',['parentid'=>$parentid])->limit($limit)->orderBy('rand()')->all();

    return $data;
}

 function getClasifiById($clas)
 {
        $data = Clasificacion::find()->asArray()->where('id_clasifi=:id_clasifi',['id_clasifi'=>$clas])->all();
        return $data;


}
}
