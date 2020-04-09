<?php

namespace app\controllers;

use Yii;
use app\models\JobDetail;
use app\models\Job;
use app\models\JobDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JobDetailController implements the CRUD actions for JobDetail model.
 */
class JobDetailController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all JobDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JobDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JobDetail model.
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
     * Creates a new JobDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new JobDetail();

        if ($model->load(Yii::$app->request->post())) {
            $model->job_id=$id;
            $model->user_create=@Yii::$app->user->identity->id;
//            return;
            $model->save();
        $sumcost = JobDetail::find()->where(['job_id' => $id])->sum('total_cost');
        $sumprice=JobDetail::find()->where(['job_id' => $id])->sum('total_price');
         $sumvat = (($sumprice-(($sumprice*60)/100))*7)/100 ;
        $profit = ($sumprice - $sumcost)-$sumvat;
        $updatecost = Job::findOne($id);
        $updatecost->total_cost = $sumcost;
        $updatecost->total_price = $sumprice;
        $updatecost->total_vat=$sumvat;
        $updatecost->total_profit=$profit;
        $updatecost->update();
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'id'=>$id
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->job_detail_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

 
    protected function findModel($id)
    {
        if (($model = JobDetail::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
