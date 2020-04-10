<?php

namespace app\controllers;

use Yii;
use app\models\Job;
use app\models\JobSearch;
use app\models\JobDetail;
use app\models\Customer;
use app\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use wbraganca\dynamicform\DynamicFormWidget;
//use Mpdf\Mpdf;
use kartik\mpdf\Pdf;

use yii\filters\AccessControl;

include_once '../inc/thaidate.php';

class JobController extends Controller {
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
//                'only' => ['index'],
                'rules' => [
                 
                    [
                        'allow' => true,
                        'actions' => ['index','view','updatecost','edit','editdetail','deletedetail','create','delete'
                            ,'pdfq','pdfinvoice'],
                        'roles' => ['Admin'],
                    ],
                ],
            ],
            
        ];
    }

    public function actionIndex() {
        $searchModel = new JobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['job_id' => SORT_DESC]);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    ///// update ต้นทุน กำไร ต่างๆ
    public function actionUpdatecost($id) {
        $sumcost = JobDetail::find()->where(['job_id' => $id])->sum('total_cost');
        $sumprice = JobDetail::find()->where(['job_id' => $id])->sum('total_price');
//=((D3-((D3*60)/100))*7)/100

            $sumvat = (($sumprice-(($sumprice*60)/100))*7)/100 ;
            $profit = ($sumprice - $sumcost)-$sumvat;
        $updatecost = Job::findOne($id);
        $updatecost->total_cost = $sumcost;
        $updatecost->total_price = $sumprice;
            $updatecost->total_vat = $sumvat;
        $updatecost->total_profit = $profit;
        $updatecost->update();
    }
    ////////////////////

    public function actionEdit($id) {
        $model = $this->findModel($id);
        $jobdetail = JobDetail::find()->where(['job_id' => $id])->all();
        $this->actionUpdatecost($id);
        if ($model->load(Yii::$app->request->post())) {
            $job_id = $model->job_id;
            $this->actionUpdatecost($job_id);
            $model->user_update = @Yii::$app->user->identity->id;
            $model->doc_num = (date('Y') + 543) . '00' . $model->job_id;
            $model->save();
            return $this->redirect(Yii::$app->request->referrer);
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',//
            'allModels' => $jobdetail,
            'pagination' => ['pageSize' => 1500],
        ]);
        return $this->render('edit', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEditdetail($id) {
        $model = JobDetail::find()->where(['job_detail_id' => $id])->one();

        if ($model->load(Yii::$app->request->post())) {
            $job_id = $model->job_id;
            $this->actionUpdatecost($job_id);
            $model->total_cost = $model->cost * $model->num;
            $model->total_price = $model->price * $model->num;
            $model->user_update = @Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->renderAjax('editdetail', [
                    'model' => $model,
                    'id' => $id,
        ]);
    }

    public function actionDeletedetail($id) {
        $model = JobDetail::find()->where(['job_detail_id' => $id])->one();
        $model->delete();
        $job_id = $model->job_id;
        $this->actionUpdatecost($job_id);

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionCreate() {
        $model = new Job();
        if ($model->load(Yii::$app->request->post())) {
            $model->job_update_date = date('Y/m/d');
            $model->user_create = @Yii::$app->user->identity->id;
            $model->status = 'n';
            $model->save();
            $model->doc_num = (date('Y') + 543) . '00' . $model->job_id;
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->renderAjax('create', [
                    'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }

    //////////export section//////////////

    public function actionPdfinvoice($id) {
        $model = JobDetail::find()->where(['job_id' => $id])->all();
        $job = Job::find()->where(['job_id' => $id])->one();
        $cus = Customer::find()->where(['customer_id' => $job->customer_id])->one();
        $content = $this->renderPartial('_PDFinvoice', [
            'model' => $model,
            'job' => $job,
            'cus' => $cus,
        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'defaultFont' => 'Garuda',
        ]); // or new Pdf();
        $mpdf = $pdf->api; // fetches mpdf api
        $mpdf->SetDisplayMode('fullwidth');
        $mpdf->SetWatermarkImage('../img/logo.png');
        $mpdf->showWatermarkImage = true;
//        $mpdf->SetHeader('Kartik Header'); // call methods or set any properties
        $mpdf->WriteHtml($content); // call mpdf write html
        echo $mpdf->Output('abconnect_invoice_' . $job->job_name . '_' . date('Y/m/d') . '.pdf', 'I'); // call the mpdf api output as needed
    }

    public function actionPdfq($id) {
        $model = JobDetail::find()->where(['job_id' => $id])->all();
        $job = Job::find()->where(['job_id' => $id])->one();
        $cus = Customer::find()->where(['customer_id' => $job->customer_id])->one();
        $content = $this->renderPartial('_PDFq', [
            'model' => $model,
            'job' => $job,
            'cus' => $cus,
        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'defaultFont' => 'Garuda',
        ]); // or new Pdf();
        $mpdf = $pdf->api; // fetches mpdf api
        $mpdf->SetDisplayMode('fullwidth');
        $mpdf->SetWatermarkImage('../img/logo.png');
        $mpdf->showWatermarkImage = true;
//        $mpdf->SetHeader('Kartik Header'); // call methods or set any properties
        $mpdf->WriteHtml($content); // call mpdf write html
        echo $mpdf->Output('abconnect_quotation_' . $job->job_name . '_' . date('Y/m/d') . '.pdf', 'I'); // call the mpdf api output as needed
    }

    /////////end export section////////////////

    protected function findModel($id) {
        if (($model = Job::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

//fkldvlds
