<?php

namespace backend\controllers;

use Yii;
use backend\models\DetalleStand;
use backend\models\DetalleStandSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalleStandController implements the CRUD actions for DetalleStand model.
 */
class DetalleStandController extends Controller
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
     * Lists all DetalleStand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetalleStandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetalleStand model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DetalleStand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetalleStand();

        if ($model->load(Yii::$app->request->post())) {



            $db = Yii::$app->db;
            $db->createCommand()->insert('detalle_stand', [
                                           'id_ds' =>$model->id_ds,
            'detalleMP_id' => $model->detalleMP_id,
            'producto_id' => $model->producto_id,
            'estado_id' => $model->estado_id,
            'precio_total' => $model->precio_total,
            'cantidades' => $model->cantidades,
                                    ])->execute();




                $producto = Yii::$app->request->post();
        
         foreach ($producto["DetalleStand"]["producto_id"] as $key => $value) {
             echo $value;
          // }
          // exit;

              

            $db->createCommand()->insert('detalle_stand_producto', [
                                          
                                        'ds_id'=>$model->id_ds,
                                        'producto_id' =>$value ,

                                        
                                    ])->execute();
            

            //$model->save();

         }









            return $this->redirect(['view', 'id' => $model->id_ds]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DetalleStand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ds]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DetalleStand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetalleStand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DetalleStand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DetalleStand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
