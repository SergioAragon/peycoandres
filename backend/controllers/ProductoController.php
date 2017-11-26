<?php

namespace backend\controllers;

use Yii;
use backend\models\Producto;
use backend\models\ProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        /* $producto = new Producto();
          $producto = Yii::$app->request->post();
        
         foreach ($producto["Producto"]["color_id"] as $key => $value) {
             echo $value;

         }
         
         exit;*/

            


        $model = new Producto();       

        if ($model->load(Yii::$app->request->post()) ) {


            $model->imgfile = UploadedFile::getInstance($model, 'imgfile');            
            $model->imag_adju = ($model->imgfile->baseName . '.' . $model->imgfile->extension);
            $model->imgfile->saveAs('../web/img/' . $model->imag_adju);



            $db = Yii::$app->db;
            $db->createCommand()->insert('producto', [
            'id_producto' => $model->id_producto,
            'nombre' => $model->nombre,
            
            'cod_clasifi' => $model->cod_clasifi,
            'dimension_producto' => $model->dimension_producto,
            //'cantidad' => $model->cantidad,
            'imag_adju' => $model->imag_adju,
            'unidades' => $model->unidades,
            'costo' => $model->costo,
            'estado_id' => $model->estado_id,
            //'color_id' =>$model->color_id,
            'cantidad_color' => $model->cantidad_color,
            'materiales_id' => $model->materiales_id,
                                    ])->execute();


             $producto = Yii::$app->request->post();
        
         foreach ($producto["Producto"]["color_id"] as $key => $value) {
             echo $value;
         // }
         // exit;

              

            $db->createCommand()->insert('detalle_producto_color', [
                                          //'id_dpc' => $model->id_producto+1,
                                        'producto_id' =>$model->id_producto ,
                                        'color_id'=>$value,
                                        'cantidad'=>$model->cantidad_color,
                                        'estado_id'=>$model->estado_id,
                                    ])->execute();
            

            //$model->save();

         }

          $db->createCommand()->insert('detalle_producto_material', [
                                          //'id_dpm' => $model->id_producto+1,
                                        'materiales_id'=>$model->materiales_id,
                                        'Producto_id_producto'=>$model->id_producto,
                                        'estado_id'=>$model->estado_id,
                                    ])->execute();

            
            //if($model->validate())
            //{
                  //$db = Yii::$app->db;

            //       $db->createCommand()->update('producto', [
            //                                'id_producto' =>$model->id_producto,
            // 'nombre' => $model->nombre,
            // 'cod_tipo' => $model->cod_tipo,
            // 'cod_clasifi' => $model->cod_clasifi,
            // 'dimension_producto' => $model->dimension_producto,
            // 'cantidad' => $model->cantidad,
            // 'imag_adju' => $model->imag_adju,
            // 'unidades' => $model->unidades,
            // 'costo' => $model->costo,
            // 'estado_id' => $model->estado_id,
            // 'color_id' => $value,
            // 'cantidad_color' => $model->cantidad_color,
            // 'materiales_id' => $model->materiales_id,
            //                         ])->execute();






            // $db->createCommand()->insert('detalle_producto_color', [
            //                               'id_dpc' => $model->id_producto,
            //                             'producto_id' =>$model->id_producto ,
            //                             'color_id'=>$value,
            //                             'cantidad'=>$model->cantidad,
            //                             'estado_id'=>$model->estado_id,
            //                         ])->execute();
            //  $db->createCommand()->insert('detalle_producto_material', [
            //                               'id_dpm' => $model->id_producto,
            //                             'materiales_id'=>$model->materiales_id,
            //                             'Producto_id_producto'=>$model->id_producto,
            //                             'estado_id'=>$model->estado_id,
            //                         ])->execute();
            //}

           
            return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->id_producto]);
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        } 
      
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

             if($model->validate())
            {
                  $db = Yii::$app->db;
            $db->createCommand()->update('detalle_producto_color', [
                                          
                                        'producto_id' =>$model->id_producto ,
                                        'color_id'=>$model->color_id,
                                        'cantidad'=>5,
                                        'estado_id'=>$model->estado_id,
                                    ],"Producto_id=$model->id_producto")->execute();

             $db->createCommand()->update('detalle_producto_material', [
                                          //'id_dpm' => $model->id_producto,
                                        'materiales_id'=>$model->materiales_id,
                                        'Producto_id_producto'=>$model->id_producto,
                                        'estado_id'=>$model->estado_id,
                                    ],"Producto_id_producto=$model->id_producto")->execute();

            }




            return $this->redirect(['view', 'id' => $model->id_producto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Producto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}


