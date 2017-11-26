<?php

namespace frontend\controllers;
use frontend\models\Producto;
use frontend\models\CLasificacion;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

public function actionListbycat($id){
    $product = new Producto();
    $Clasif = new CLasificacion();



     $dataCla = $Clasif->getClasifBy($id);
        $listid="";
        if(!empty($dataCla)){
            $i=0;
            foreach ($dataCla as $key => $value) {
                $i++;
                if($i==1){
                    $listid .= $value["id_clasifi"];
                }else{
                    $listid .= ",".$value["id_clasifi"];
                }
            }
        }else{
             $listid = $id;
        }

        $data = $product->getProductByClas($listid);
        $pages = $product->getPagerProducto($listid);
        $tem =array();
        if(!empty($id)){
            //lấy ra tên Category
            $dataClas = $Clasif->getClasifiById($id);
            if($dataClas)
                $tem = $dataClas[0]["descripcion"];
        }
  
     return $this->render('listProducto',[
     	'data'=>$data,
     	'dataClas'=>$tem,
     	"pages"=>$pages]
     );
	
}

function actionDetalle($id)
{
 $data = new Producto();
 $product = $data->getInfoProducto($id);
 return $this->render('detalle',["data"=>$product]);
        
}


}
