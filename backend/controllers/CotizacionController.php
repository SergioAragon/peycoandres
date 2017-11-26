<?php

namespace backend\controllers;

use Yii;
use backend\models\Cotizacion;
use backend\models\CotizacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Clientes;

/**
 * CotizacionController implements the CRUD actions for Cotizacion model.
 */
class CotizacionController extends Controller
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
     * Lists all Cotizacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CotizacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cotizacion model.
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
     * Creates a new Cotizacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cotizacion();

        if ($model->load(Yii::$app->request->post())) {

            $db = Yii::$app->db;
            $db->createCommand()->insert('cotizacion', [
                                           'id_cotizacion' =>$model->id_cotizacion,
            'cliente_id' => $model->cliente_id,
            'producto_id' => $model->producto_id,
            'fecha' => $model->fecha,
                                    ])->execute();



 $producto = Yii::$app->request->post();
                         $sum=0;
         foreach ($producto["Cotizacion"]["producto_id"] as $key => $value) {
             //echo $value;


          if ($value!=null) {
            $query = (new \yii\db\Query())
    ->select('costo')
    ->from('producto')->where("id_producto =  $value");
// Crea un commando
$command = $query->createCommand();
// Ejecuta el commando
$rows = $command->queryAll();
              // print_r($rows);

              foreach ($rows as $col=>$value) {

                  // print_r($value);
                   //echo implode($value);
                   //implode(glue, pieces)
                
                $sum+=implode($value);

               }

                //echo $sum;
            

          }

          }

               foreach ($producto["Cotizacion"]["producto_id"] as $key => $value) {
             //echo $value;
          // }
          // exit;
            $db->createCommand()->insert('detalle_cotizacion_productos', [
                                          
                                        
                                        'producto_id' =>$value ,
                                        'cotizacion_id'=>$model->id_cotizacion,
                                        'total_cotizacion'=>$sum,                                 
                                    ])->execute();

         }






            return $this->redirect(['view', 'id' => $model->id_cotizacion]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cotizacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cotizacion]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cotizacion model.
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
     * Finds the Cotizacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cotizacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cotizacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
