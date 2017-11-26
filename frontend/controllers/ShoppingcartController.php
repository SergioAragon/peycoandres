<?php

namespace frontend\controllers;
use Yii;
use common\libs\Cart;
use Yii\web\Session;

class ShoppingcartController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    function actionAddcart($id,$num)
    {
    $cart= new Cart();
    $cart->addCart($id, $num);

    echo "<prE>";
    print_r(Yii::$app->session['cart']);
       die;
    }


function actionListcart(){
    $this->layout='login';
$cart = Yii::$app->session['cart'];
return $this->render('cartitem',['cart'=>$cart]);

}


function actionUpdatecart($id,$num){
    $cart = new Cart();
    $cart->updateCart($id, $num);
  return  $this->renderPartial('cartitem',['cart'=>$cart]);
}

}
