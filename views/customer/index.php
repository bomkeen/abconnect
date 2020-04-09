<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = ['label' => 'Setting', 'url' => ['/setting/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Modal::begin([
    'header' => '<a href="#" class="btn btn-primary alert-primary" data-dismiss="modal">ปิด</a>',
    'id' => 'modal',
    'size' => 'modal-sg',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>'
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-3">
            <div class="well-lg">
                <?=
                Html::button('เพิ่มข้อมูล', [
                    'id' => 'modalcreate',
                    'value' => \yii\helpers\Url::to(['customer/create'])
                    , 'class' => 'btn btn-lg btn-block btn-success createmodal'])
                ?> 
            </div>
        </div>
    </div>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="container container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
//                Pjax::begin(); 
                ?>

                <?php
                $gridColumns = [
                    [
                        'label' => 'customer ID',
                        'attribute' => 'customer_id',
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->customer_id;
                        },
                        'width' => '8%',
                        'filterWidgetOptions' => [
                            'showDefaultPalette' => false,
                        ],
                        'vAlign' => 'middle',
                        'hAlign' => 'center',
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Customer name',
                        'attribute' => 'customer_name',
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->customer_name;
                        },
                        'width' => '30%',
                        'filterWidgetOptions' => [
                            'showDefaultPalette' => false,
                        ],
                        'vAlign' => 'middle',
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Customer detail',
                        'attribute' => 'customer_detail',
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->customer_detail;
                        },
                        'width' => '30%',
                        'filterWidgetOptions' => [
                            'showDefaultPalette' => false,
                        ],
                        'vAlign' => 'middle',
                        'format' => 'raw',
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => ' {update} {delete}',
                        'header' => 'จัดการ',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return Html::button('<i class="glyphicon glyphicon-pencil"></i>', ['value' => Url::to($url),
                                            'class' => 'systemuser-edit btn btn-primary']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash btn btn-danger"></span>', $url, [
                                            'title' => Yii::t('app', 'lead-delete'), 'data-method' => 'post'
                                            , 'data-confirm' => "ต้องการลบรายกาใช่หรือไม่?",
                                ]);
                            },
                        ],
                    ],
                ];



                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'krajeeDialogSettings' => [
                        'options' => ['title' => 'ยืนยันการทำรายการ'
                            , 'type' => Dialog::TYPE_DANGER
                        ]
                    ],
                    'bordered' => false,
                    'striped' => false,
                    'condensed' => false,
                    'responsive' => true,
                    'columns' => $gridColumns,
                    'pjax' => true,
                    'pjaxSettings' => [
                        'neverTimeout' => true,
                    ],
                    'toolbar' => [
                        ['content' =>
//                      Html::button('<i class="glyphicon glyphicon-plus"> เพิ่มผู้ใช้งาน</i>',  ['value'=>Url::to('index.php?r=helpdeskuser/create'),'class' => 'btn btn-success','id'=>'modalButton']). ' '.
                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Refresh'])
                        ],
                        '{export}',
                        '{toggleData}',
                    ],
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => '<b>ผู้ใช้งาน</b>',
                    ],
                    'persistResize' => false,
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
</div>




</div>
