<?php 
namespace common\libs;

use Yii;
use Yii\web\Session;
use frontend\models\Producto;


class Cart
{
	function addCart($id, $num=1)
	{
	$data = new Producto();
      $dataPro=$data->getInfoProducto($id);
       if (!isset(Yii::$app->session['cart'])){
       	$cart[$id] =[
      'nombre'=>$dataPro['nombre'],
      'costo'=>$dataPro['costo'],
      'imag_adju'=>$dataPro['imag_adju'],
      'pro_sl'=>$num,
      'unidades'=>$dataPro['unidades'],
      'color_id'=>$dataPro['color_id'],
      'materiales_id'=>$dataPro['materiales_id'],
       	];

       }else{
       	$cart =Yii::$app->session['cart'];
       	if (array_key_exists($id, $cart)) {
       	$cart[$id] =[
      'nombre'=>$dataPro['nombre'],
      'costo'=>$dataPro['costo'],
      'imag_adju'=>$dataPro['imag_adju'],
      'pro_sl'=> (int)$cart[$id] ['pro_sl'] + $num,
      'unidades'=>$dataPro['unidades'],
      'color_id'=>$dataPro['color_id'],
      'materiales_id'=>$dataPro['materiales_id'],

       ];
       	}else{
                $cart[$id] =[
                'nombre'=>$dataPro['nombre'],
                'costo'=>$dataPro['costo'],
                 'imag_adju'=>$dataPro['imag_adju'],
                'pro_sl'=>$num,
                'unidades'=>$dataPro['unidades'],
                'color_id'=>$dataPro['color_id'],
                'materiales_id'=>$dataPro['materiales_id'],

       			];
                  }
       }
       Yii::$app->session['cart']=$cart;
	}

function updateCart($id, $num){
       if (isset(Yii::$app->session['cart'])){
            $cart = Yii::$app->session['cart'];
            if (array_key_exists($id, $cart)) {
            $cart[$id] =[
      'nombre'=>$cart[$id]['nombre'],
      'costo'=>$cart[$id]['costo'],
      'imag_adju'=>$cart[$id]['imag_adju'],
      'pro_sl'=>  $num,
      'unidades'=>$cart[$id]['unidades'],
      'color_id'=>$cart[$id]['color_id'],
      'materiales_id'=>$cart[$id]['materiales_id'],
              ];
            }
             Yii::$app->session['cart'] = $cart;

      }

     }

}