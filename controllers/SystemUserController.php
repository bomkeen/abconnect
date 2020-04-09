<?php

namespace app\controllers;

use Yii;
use app\models\SystemUser;
use app\models\SystemUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SystemUserController implements the CRUD actions for SystemUser model.
 */
class SystemUserController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'Create', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'delete'],
                        'roles' => ['Admin'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex() {

        // modol from web/js
        $searchModel = new SystemUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id) {
        return $this->renderAjax('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate() {
        $model = new SystemUser();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                $auth = Yii::$app->authManager;
                $authorRole = $auth->getRole($model->role);
                $auth->assign($authorRole, $model->getPrimaryKey());
            }
//            return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->renderAjax('create', [
                    'model' => $model,
        ]);
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('update', [
                    'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionRegister() {

        return $this->render('register');
    }

    protected function findModel($id) {
        if (($model = SystemUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
