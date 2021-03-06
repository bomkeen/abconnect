<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

include_once '../inc/thaidate.php';
$this->title = 'รายงานการแบ่งเงิน';
$this->params['breadcrumbs'][] = ['label' => 'Report', 'url' => ['/report/index']];
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


</style>
<div class="report-profitforyou">

    <h1><?= Html::encode($this->title) ?></h1>

  <?php if($total_profit>0){ ?>
    <div class="panel-body">
            <div class="row">

                <div class="col-xs-10 col-md-offset-4 col-xs-offset-1 col-md-4">
                    <a href="#" class="btn btn-block btn-primary btn-lg" role="button">
                        <span class="glyphicon glyphicon-btc">

                        </span> <br/><?php echo $total_profit ;?><br/>กำไรรอการแบ่ง โดยประมาณ</a>
                </div>
              
             


            </div>
        </div>
  <?php } ?>
    <div class="container container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
//                Pjax::begin(); 
                ?>

                <?php
                $gridColumns = [
                    [
                        'label' => 'Jobs ID',
                        'attribute' => 'ลำดับ',
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->job_id;
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
                        'label' => 'ใบงาน',
                        'attribute' => 'job_name',
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->job_name;
                        },
                        'width' => '30%',
                        'filterWidgetOptions' => [
                            'showDefaultPalette' => false,
                        ],
                        'vAlign' => 'middle',
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Jobs Date',
                        'attribute' => 'job_date',
                        'value' => function ($model, $key, $index, $widget) {
                            return thaidate($model->job_date);
                        },
                        'width' => '10%',
                        'filterWidgetOptions' => [
                            'showDefaultPalette' => false,
                        ],
                        'vAlign' => 'middle',
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Pay',
                        'attribute' => 'status',
//                        'filter' => ArrayHelper::map(\app\models\Customer::find()->all(), 'customer_id', 'customer_name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->status == 'y' ? "<span style=\"color:green;\">ชำระเงินแล้ว</span>" : "<span style=\"color:red;\">รอการชำระเงิน</span>";
                        },
                        'width' => '20%',
                        'filterWidgetOptions' => [
                            'showDefaultPalette' => false,
                        ],
                        'vAlign' => 'middle',
                        'hAlign' => 'center',
                        'format' => 'html',
                    ],
                    [
                        'label' => 'แบ่งเงิน',
                        'attribute' => 'profit_status',
//                        'filter' => ArrayHelper::map(\app\models\Customer::find()->all(), 'customer_id', 'customer_name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->profit_status == 1 ? "<span style=\"color:green;\">YES</span>" : "<span style=\"color:red;\">ยังไม่ได้แบ่ง</span>";
                        },
                        'width' => '20%',
                        'filterWidgetOptions' => [
                            'showDefaultPalette' => false,
                        ],
                        'vAlign' => 'middle',
                        'hAlign' => 'center',
                        'format' => 'html',
                    ],
                 
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => ' {update} ',
                        'header' => 'update',
                        'urlCreator' => function($action, $model, $key, $index) {

                            return Url::toRoute(['report/updateprofitstatus', 'id' => $model->job_id]);
                        },
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return Html::button('<i class="glyphicon glyphicon-pencil"></i>'
                                                , ['value' => Url::to($url),
                                            'class' => 'edit-jobdetail btn btn-warning']);
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
                    'responsiveWrap' => false,
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
                        'heading' => '<i class="glyphicon glyphicon-th-list"></i>',
                    ],
                    'persistResize' => false,
                ]);
                ?>
            </div>
        </div>
    </div>
</div>

