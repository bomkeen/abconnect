<?php

namespace app\controllers;
use Yii;
use app\models\Job;
use app\models\JobSearch;

class ReportController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionProfitforyou() {
        $searchModel = new JobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('profitforyou', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionUpdateprofitstatus($id) {
                
//        $model = $this->findModel($id);
        $model=JobDetailList::find()->where(['job_detail_id' => $id])->one();

        if ($model->load(Yii::$app->request->post()) ) {
            
            $model->job_detail_id=$id;
            $model->user_update=@Yii::$app->user->identity->id;
            $model->save();
//            return $this->redirect(['view', 'id' => $model->job_detail_list_id]);
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('updateprofitstatus', [
            'model' => $model,
        ]);
        
    }

}
