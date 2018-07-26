<?php

namespace frontend\controllers;

use Yii;
use app\models\OrdersHept;
use app\models\OrdersHeptSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * OrderHeptController implements the CRUD actions for OrdersHept model.
 */
class OrderHeptController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','create','update','view'],
                        //'roles' => ['@'],
                        'roles' => ['admin'],
                        'ips' => [],
                    ],
                    
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all OrdersHept models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersHeptSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrdersHept model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OrdersHept model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrdersHept();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrdersHept model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $email = Yii::$app->db->createCommand("select email from user where id =:id")
            ->bindValue(":id", $model->customer_id)->queryOne()['email'];            
            
            
            $mail = Yii::$app->mailer->compose()->setFrom("test@heptagon.com")
            ->setTo($email)
            ->setSubject('Status Mail');            
            
            
            $mail->setHtmlBody("your order number ".$model->id." dated ".$model->purchasedate
                    ."has been ".$model->delivery_status."on ".date('d-m-y')
            );                               
            $mail->send();
            
            
            
            
        
            return $this->render('view',[ 'model' => $model]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Finds the OrdersHept model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrdersHept the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrdersHept::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
