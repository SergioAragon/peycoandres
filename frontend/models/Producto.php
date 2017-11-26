<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;


/**
 * This is the model class for table "producto".
 *
 * @property integer $id_producto
 * @property string $nombre
 * @property integer $cod_tipo
 * @property integer $cod_clasifi
 * @property string $dimension_producto
 * @property string $imag_adju
 * @property integer $unidades
 * @property string $costo
 * @property integer $estado_id
 * @property integer $color_id
 * @property integer $cantidad_color
 * @property integer $materiales_id
 *
 * @property DetalleStand[] $detalleStands
 * @property Clasificacion $codClasifi
 * @property TipoProducto $codTipo
 * @property Estado $estado
 * @property Materiales $materiales
 * @property Color $color
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_producto', 'nombre', 'cod_tipo', 'cod_clasifi', 'dimension_producto', 'imag_adju', 'unidades', 'costo', 'estado_id', 'cantidad_color', 'materiales_id'], 'required'],
            [['id_producto', 'cod_tipo', 'cod_clasifi', 'unidades', 'estado_id', 'color_id', 'cantidad_color', 'materiales_id'], 'integer'],
            [['nombre', 'dimension_producto', 'imag_adju', 'costo'], 'string', 'max' => 20],
            [['cod_clasifi'], 'exist', 'skipOnError' => true, 'targetClass' => Clasificacion::className(), 'targetAttribute' => ['cod_clasifi' => 'id_clasifi']],
            [['cod_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProducto::className(), 'targetAttribute' => ['cod_tipo' => 'id_tp']],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_id' => 'id_estado']],
            [['materiales_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materiales::className(), 'targetAttribute' => ['materiales_id' => 'id_mate']],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => Color::className(), 'targetAttribute' => ['color_id' => 'id_color']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'nombre' => 'Nombre',
            'cod_tipo' => 'Cod Tipo',
            'cod_clasifi' => 'Cod Clasifi',
            'dimension_producto' => 'Dimension Producto',
            'imag_adju' => 'Imag Adju',
            'unidades' => 'Unidades',
            'costo' => 'Costo',
            'estado_id' => 'Estado ID',
            'color_id' => 'Color ID',
            'cantidad_color' => 'Cantidad Color',
            'materiales_id' => 'Materiales ID',
        ];
    }




function getDataProductos($limit = 6)
    {

$data = producto::find()->asArray()->limit($limit)->orderBy('rand()')->all();

return $data;
 }


function getDataTabProductos($clasid, $limit = 4)
    {

$data = producto::find()->asArray()->where('cod_clasifi=:clasid',['clasid'=>$clasid])->limit($limit)->orderBy('rand()')->all();

return $data;
 }



 function getProductByClas($clas)

{
$pages = $this->getPagerProducto($clas);
$data= producto::find()->asArray()->where('cod_clasifi=:cod_clasifi',['cod_clasifi'=>$clas])->offset($pages->offset)->limit($pages->limit)->all();
return $data;

}
 

  function getPagerProducto($clas){
        $data = producto::find()->asArray()->where('cod_clasifi=:cod_clasifi', ['cod_clasifi'=>$clas])->all();
        $pages = new Pagination(['totalCount' =>count($data),'pageSize'=>'12']);
        return $pages;
    }

    function getInfoProducto($id)
    {
      $data = producto::find()->asArray()->where('id_producto=:id',['id'=>$id])->one();
      return $data;
    }


    


  



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleStands()
    {
        return $this->hasMany(DetalleStand::className(), ['producto_id' => 'id_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodClasifi()
    {
        return $this->hasOne(Clasificacion::className(), ['id_clasifi' => 'cod_clasifi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodTipo()
    {
        return $this->hasOne(TipoProducto::className(), ['id_tp' => 'cod_tipo']);
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
    public function getMateriales()
    {
        return $this->hasOne(Materiales::className(), ['id_mate' => 'materiales_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Color::className(), ['id_color' => 'color_id']);
    }
}
