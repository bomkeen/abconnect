<?php

namespace app\controllers;

use yii;
use app\models\Job;
use app\models\JobSearch;
use app\models\JobDetail;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\base\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

class AdddetailController extends \yii\web\Controller {
//    public function actionIndex() {
//        return $this->render('index');
//    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex() {
        $modelJob = new Job;
        $modelsJobDetail = [new JobDetail];
        if ($modelJob->load(Yii::$app->request->post())) {
            $modelsJobDetail = Model::createMultiple(JobDetail::classname());
            Model::loadMultiple($modelsJobDetail, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                                ActiveForm::validateMultiple($modelsJobDetail), ActiveForm::validate($modelJob)
                );
            }

            // validate all models
            $valid = $modelJob->validate();
            $valid = Model::validateMultiple($modelsJobDetail) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelJob->save(false)) {
                        foreach ($modelsJobDetail as $modelJobDetail) {
                            $modelJobDetail->job_id = $modelJob->job_id;
                            if (!($flag = $modelJobDetail->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelJob->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('index', [
                    'modelJob' => $modelJob,
                    'modelsJobDetail' => (empty($modelsJobDetail)) ? [new JobDetail] : $modelsJobDetail
        ]);
    }

    public function actionUpdate($id) {
//        $modelJob = $this->findModel($id);
        $modelJob = Job::findOne($id);
        $modelsJobdetail = $modelJob->job_id;

        if ($modelJob->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsJobdetail, 'id', 'id');
            $modelsJobdetail = Model::createMultiple(Address::classname(), $modelsJobdetail);
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsJobdetail, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                                ActiveForm::validateMultiple($modelsJobdetail), ActiveForm::validate($modelJob)
                );
            }

            // validate all models
            $valid = $modelJob->validate();
            $valid = Model::validateMultiple($modelsJobdetail) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelJob->save(false)) {
                        if (!empty($deletedIDs)) {
                            Address::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsJobdetail as $modelJobdetail) {
                            $modelJobdetail->job_id = $modelJob->job_id;
                            if (!($flag = $modelJobdetail->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['job/view', 'id' => $modelJob->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('index', [
                    'modelJob' => $modelJob,
                    'modelsJobdetail' => (empty($modelsJobdetail)) ? [new Jobdetail] : $modelsJobdetail
        ]);
    }

}
