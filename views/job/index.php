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
$this->title = 'ใบงาน';
//$this->params['breadcrumbs'][] = ['label' => 'Setting', 'url' => ['/setting/index']];
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
                <p>
                    <?php
//                    Html::a('Create Job Detail', ['create'], ['class' => 'btn btn-success create-job']) 
                    echo Html::button('เพิ่มข้อมูล', [
                        'id' => 'create-job',
                        'value' => \yii\helpers\Url::to(['job/create'])
                        , 'class' => 'btn btn-lg  btn-success createmodal'])
                    ?>

                </p>

            </div>
        </div>
    </div>
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
                        'width' => '40%',
                        'filterWidgetOptions' => [
                            'showDefaultPalette' => false,
                        ],
                        'vAlign' => 'middle',
                        'format' => 'raw',
                    ],
                    [
                        'class' => 'kartik\grid\ExpandRowColumn',
                        'width' => '50px',
                        'hAlign' => 'center',
//                            'header' => ['class' => 'kartik-sheet-style'],
                        'enableRowClick' => TRUE,
                        'expandTitle' => 'ข้อมูลเพิ่มเติม',
                        'expandAllTitle' => 'ข้อมูลเพิ่มเติม',
                        'expandIcon' => '<span class="glyphicon glyphicon-hand-down"></span>',
                        'value' => function ($model, $key, $index, $column) {
                            return GridView::ROW_COLLAPSED;
                        },
                        'detail' => function ($model, $key, $index, $column) {
                            if ($model->status == 'n') {
                                $model->status_date = 'ยังไม่จ่าย';
                            } elseif ($model->status_date == '') {
                                $model->status_date = 'ยังไม่อัพเดท';
                            } elseif ($model->status_date == '0000-00-00') {
                                $model->status_date = 'ยังไม่อัพเดท';
                            } else {
                                $model->status_date = thaidate($model->status_date);
                            }
                            return //'hello world';//Yii::$app->controller->renderPartial('_expand-row-details', ['model'=>$model]);
                                    '
                  <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>

                    </thead>
                    <tbody>
                      <tr>
                      <th class="col-md-3"><span ></span><b>ทุนรวม</b></th>
                      <th class="col-md-3"><span ></span><b>VAT</b></th>
                        <th class="col-md-3"><span ></span><b>กำไรโดยประมาณ</b></th>
                        <th class="col-md-3"><span ></span><b>Pay Date</b></th>
                        
                      </tr>
                      <tr>
                        <td class="col-md-3">' . $model->total_cost . '</td>
                        <td class="col-md-3">' . $model->total_vat . '</td>
                            <td class="col-md-3">' . $model->total_profit . '</td>  
                            <td class="col-md-3">' . $model->status_date . '</td>  
                       
                      </tr>
                    </tbody>
                  </table>
                  </div>
                  ';
                        },
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'expandOneOnly' => true
                    ],
                    [
                        'label' => 'ลูกค้า',
                        'attribute' => 'customer_name',
                        'filter' => ArrayHelper::map(\app\models\Customer::find()->all(), 'customer_id', 'customer_name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->customer->customer_name;
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
                        'label' => 'edit',
                        'vAlign' => 'middle',
                        'hAlign' => 'center',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a('', ['job/edit', 'id' => $data['job_id']], ['target' => '_blank', 'class' => 'btn btn-success glyphicon glyphicon-plus']);
                        }],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{delete}',
                        'header' => 'del',
                        'buttons' => [
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

