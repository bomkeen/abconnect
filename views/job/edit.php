<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dialog\Dialog;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\web\JsExpression;
use app\models\JobDetailList;


$this->title = 'แก้ไขใบงาน';
//$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'ใบงาน', 'url' => ['job/index']];
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
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <?php
                echo 'รายละเอียดโครงการ :: ' . $model->job_name;
                ?>
            </div>
            <div class="panel-body">
                <?php
                echo $this->render('_formedit', [
                    'model' => $model,
//        'modelJobsdetail' => $modelJobsdetail
                ]);
                ?>
            </div>
        </div>
    </div>
</div>

<div class="well well-sm">
    <?= Html::a('พิมพ์ใบเสร็จรับเงิน', ['pdfinvoice', 'id' => $model->job_id], ['class' => 'btn btn-info']) ?>
    <?= Html::a('พิมพ์ใบเสอราคา', ['pdfq', 'id' => $model->job_id], ['class' => 'btn btn-success']) ?>
    <?= Html::a('พิมพ์ใบส่งสินค้า', ['pdfdeliver', 'id' => $model->job_id], ['class' => 'btn btn-primary']) ?>

</div>
<div class="row">

    <div class="col-md-12">

        <div class="panel panel-info">
            <div class="panel-heading">
                <div align="right">
                    <?php
                    echo Html::button('เพิ่มข้อมูล', [
                        'id' => 'modalcreate',
                        'value' => \yii\helpers\Url::to(['job-detail/create', 'id' => $model->job_id])
                        , 'class' => 'btn btn-lg  btn-success createmodal'])
                    ?>
                </div>
            </div>
            <div class="panel-body">
                <div class="jobdetail-index">

                    <h1>
                        <?php
//                Html::encode($this->title) 
                        ?>
                    </h1>

                    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $gridColumns = [
                                [
                                    'class' => 'kartik\grid\SerialColumn',
                                    'contentOptions' => ['class' => 'kartik-sheet-style'],
                                    'width' => '5%',
                                ],
                                [
                                    'label' => 'รายการสินค้า',
//                        'attribute' => 'customer_name',
                                    'value' => function ($model, $key, $index, $widget) {
                                        return $model->job_detail;
                                    },
                                    'width' => '30%',
                                    'filterWidgetOptions' => [
                                        'showDefaultPalette' => false,
                                    ],
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                    'format' => 'raw',
                                ],
//                                [
//                                    'label' => 'รายละเอียดเพิ่มเติม',
////                        'attribute' => 'customer_detail',
//                                    'value' => function ($model, $key, $index, $widget) {
//                                        return $model->product_detail;
//                                    },
//                                    'width' => '30%',
//                                    'filterWidgetOptions' => [
//                                        'showDefaultPalette' => false,
//                                    ],
//                                    'vAlign' => 'middle',
//                                    'format' => 'raw',
//                                ],
                                [
                                    'label' => 'ต้นทุน',
//                        'attribute' => 'customer_detail',
                                    'value' => function ($model, $key, $index, $widget) {
                                        return $model->cost;
                                    },
                                    'width' => '10%',
                                    'filterWidgetOptions' => [
                                        'showDefaultPalette' => false,
                                    ],
                                    'vAlign' => 'middle',
                                    'hAlign' => 'right',
                                    'format' => 'raw',
                                ],
                                [
                                    'label' => 'ราคาขาย',
                                    'value' => function ($model, $key, $index, $widget) {
                                        return $model->price;
                                    },
                                    'width' => '10%',
                                    'filterWidgetOptions' => [
                                        'showDefaultPalette' => false,
                                    ],
                                    'vAlign' => 'middle',
                                    'hAlign' => 'right',
                                    'format' => 'raw',
                                ],
                                [
                                    'label' => 'จำนวน',
                                    'value' => function ($model, $key, $index, $widget) {
                                        return $model->num;
                                    },
                                    'width' => '5%',
                                    'filterWidgetOptions' => [
                                        'showDefaultPalette' => false,
                                    ],
                                    'vAlign' => 'middle',
                                    'hAlign' => 'center',
                                    'format' => 'raw',
                                ],
                                [
                                    'label' => 'ทุนรวม',
                                    'value' => function ($model, $key, $index, $widget) {
                                        return $model->total_cost;
                                    },
                                    'width' => '10%',
                                    'filterWidgetOptions' => [
                                        'showDefaultPalette' => false,
                                    ],
                                    'vAlign' => 'middle',
                                    'hAlign' => 'right',
                                    'format' => 'raw',
                                ],
                                [
                                    'label' => 'ราคาขายรวม',
                                    'value' => function ($model, $key, $index, $widget) {
                                        return $model->total_price;
                                    },
                                    'width' => '10%',
                                    'filterWidgetOptions' => [
                                        'showDefaultPalette' => false,
                                    ],
                                    'vAlign' => 'middle',
                                    'hAlign' => 'right',
                                    'format' => 'raw',
                                ],
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'template' => ' {editdetail} {delete}',
                                    'header' => 'จัดการ',
                                    'urlCreator' => function($action, $model, $key, $index) {
                                        if ($action === 'editdetail') {
                                            return Url::toRoute(['editdetail', 'id' => $model->job_detail_id]);
                                        } else {
                                            return Url::toRoute(['deletedetail', 'id' => $model->job_detail_id]);
                                        }
                                    },
                                    'buttons' => [
                                        'editdetail' => function ($url, $model) {
                                            return Html::button('<i class="glyphicon glyphicon-pencil"></i>'
                                                            , ['value' => Url::to($url),
                                                        'class' => 'edit-jobdetail btn btn-warning']);
                                        },
                                        'deletedetail' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-trash btn btn-danger"></span>', $url, [
                                                        'title' => Yii::t('app', 'lead-delete'), 'data-method' => 'post'
                                                        , 'data-confirm' => "ต้องการลบรายการ ใช่หรือไม่?",
                                            ]);
                                        }
                                    ],
                                ],
                               
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'template' => ' {update}',
                                    'header' => 'เพิ่มรายละเอียด',
                                    'urlCreator' => function($action, $model, $key, $index) {
                                        $job_detail_id= JobDetailList::find()->where(['job_detail_id' => $model->job_detail_id])->one();
                                        if(empty($job_detail_id)){
                                            return Url::toRoute(['job-detail-list/create', 'id' => $model->job_detail_id]);
                                        } else {
                                        return Url::toRoute(['job-detail-list/update', 'id' => $model->job_detail_id]);    
                                        }

                                        
                                    },
                                    'buttons' => [
                                        'update' => function ($url, $model) {
                                            return Html::button('<i class="glyphicon glyphicon-plus"></i>'
                                                            , ['value' => Url::to($url),
                                                        'class' => 'edit-jobdetail btn btn-success']);
                                        },
                                    ],
                                ],
//                                [
//                                    'class' => 'kartik\grid\ActionColumn',
//                                    'template' => ' {view}',
//                                    'header' => 'View',
//                                    'urlCreator' => function($action, $model, $key, $index) {
//
//                                        return Url::toRoute(['job-detail/view', 'id' => $model->job_detail_id]);
//                                    },
//                                    'buttons' => [
//                                        'update' => function ($url, $model) {
//                                            return Html::button('<i class="glyphicon glyphicon-pencil"></i>', ['value' => Url::to($url),
//                                                        'class' => 'systemuser-edit btn btn-primary']);
//                                        },
//                                    ],
//                                ],
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
                                    'heading' => '<b>รายการสินค้าใน Project</b>',
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
</div>







