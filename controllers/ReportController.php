<?php

namespace app\controllers;

use Yii;
use app\models\Job;
use app\models\JobSearch;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class ReportController extends \yii\web\Controller {
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['index','profitforyou','updateprofitstatus'],
                'rules' => [
                 
                    [
                        'allow' => true,
                        'actions' => ['index','profitforyou','updateprofitstatus'],
                        'roles' => ['Admin'],
                    ],
                ],
            ],
            
        ];
    }

//    public function actionIndex() {
//        return $this->render('index');
//    }
    public $enableCsrfValidation = false;

    public function actionProfitforyou() {


        $searchModel = new JobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $total_profit_sql = "select sum(total_profit) from job where profit_status <>1 and status ='y' ";
        $total_profit = \Yii::$app->db->createCommand("$total_profit_sql")->queryScalar();

        return $this->render('profitforyou', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'total_profit' => $total_profit
        ]);
    }

    public function actionIndex() {

        $y = date('Y');

        //$fund = 'IPINRGR';
        if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $y = $request->post('year');
        }
        $total_vat_sql = "select sum(total_vat) from job where YEAR(job_date) = $y and status='y' ";
        $total_vat = \Yii::$app->db->createCommand("$total_vat_sql")->queryScalar();
        $total_cost_sql = "select sum(total_cost) from job where YEAR(job_date) = $y  ";
        $total_cost = \Yii::$app->db->createCommand("$total_cost_sql")->queryScalar();
        $total_profit_sql = "select sum(total_profit) from job where YEAR(job_date) = $y and status='y'  ";
        $total_profit = \Yii::$app->db->createCommand("$total_profit_sql")->queryScalar();
        return $this->render('index', [
                    'total_vat' => $total_vat,
                    'total_cost' => $total_cost,
                    'total_profit' => $total_profit,
                    'y' => $y
        ]);
    }

    public function actionUpdateprofitstatus($id) {

//        $model = $this->findModel($id);
        $model = Job::find()->where(['job_id' => $id])->one();

        if ($model->load(Yii::$app->request->post())) {

            $model->update();
//            return $this->redirect(['view', 'id' => $model->job_detail_list_id]);
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('_updateprofitstatus', [
                    'model' => $model,
        ]);
    }

}
