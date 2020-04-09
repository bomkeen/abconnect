<?php

namespace app\controllers;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class SettingController extends \yii\web\Controller
{
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
                'only' => ['index'],
                'rules' => [
                 
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['Admin'],
                    ],
                ],
            ],
            
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}
