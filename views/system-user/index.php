<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SystemUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ระบบจัดการผู้ใช้งาน';
$this->params['breadcrumbs'][] = ['label' => 'Setting', 'url' => ['/setting/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .modal-header{
        /*background-color:yellow;*/
    }

</style>

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

<div id="content" class="container-fluid fill">
    <div class="system-user-index">
        <div class="page-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>

        <?php // echo $this->render('_search', ['model' => $searchModel]);      ?>
        <div class="row">
            <div class="col-md-3">
                <div class="well-lg">
                    <?=
                    Html::button('สร้างผู้ใช้งานรายใหม่', [
//                        'id' => 'modalcreate',
                        'value' => \yii\helpers\Url::to(['system-user/create'])
                        , 'class' => 'btn btn-lg btn-block btn-success systemuser-create'])
                    ?>
                </div></div>
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
                            'label' => 'เลขที่',
                            'attribute' => 'id',
                            'value' => function ($model, $key, $index, $widget) {
                                return $model->id;
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
                            'label' => 'Username',
                            'attribute' => 'username',
                            'value' => function ($model, $key, $index, $widget) {
                                return $model->username;
                            },
                            'width' => '20%',
                            'filterWidgetOptions' => [
                                'showDefaultPalette' => false,
                            ],
                            'vAlign' => 'middle',
                            'format' => 'raw',
                        ],
                        [
                            'label' => 'ชื่อ - สกุล',
                            'attribute' => 'fullname',
                            'value' => function ($model, $key, $index, $widget) {
                                return $model->fullname;
                            },
                            'width' => '20%',
                            'filterWidgetOptions' => [
                                'showDefaultPalette' => false,
                            ],
                            'vAlign' => 'middle',
                            'format' => 'raw',
                        ],
                        [
                            'class' => 'kartik\grid\ExpandRowColumn',
                            'width' => '50px',
//                            'header' => ['class' => 'kartik-sheet-style'],
                            'enableRowClick' => TRUE,
                            'expandTitle' => 'ข้อมูลเพิ่มเติม',
                            'expandAllTitle' => 'ข้อมูลเพิ่มเติม',
                            'expandIcon' => '<span class="glyphicon glyphicon-hand-down"></span>',
                            'value' => function ($model, $key, $index, $column) {
                                return GridView::ROW_COLLAPSED;
                            },
                            'detail' => function ($model, $key, $index, $column) {
                                return //'hello world';//Yii::$app->controller->renderPartial('_expand-row-details', ['model'=>$model]);
                                        '
                  <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>

                    </thead>
                    <tbody>
                      <tr>
                        <th class="col-md-3"><span class="glyphicon glyphicon-list"></span><b> CID</b></th>
                      </tr>
                      <tr>
                        <td class="col-md-3">' . $model->cid . '</td>
                       
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
                            'label' => 'ระดับการใช้งาน',
                            'attribute' => 'role',
                            'value' => function ($model, $key, $index, $widget) {
                                return $model->role;
                            },
                            'width' => '20%',
                            'filterWidgetOptions' => [
                                'showDefaultPalette' => false,
                            ],
                            'vAlign' => 'middle',
                            'hAlign' => 'center',
                            'format' => 'raw',
                        ],
//                   [
//           'label'=>'แผนก',
//           'attribute'=>'hosinfo_department_id',
//           'value'=>function ($model, $key, $index, $widget) {
//              
//               $dep=  Department::findOne($model->hosinfo_department_id);
//               return $dep->depname;
//           },
//           'width'=>'30%',
//           'filterWidgetOptions'=>[
//               'showDefaultPalette'=>false,
//
//           ],
//           'vAlign'=>'middle',
//           'format'=>'raw',
//
//       ],
                        [
                            'label' => 'สถานะ',
                            'attribute' => 'status',
                            'hAlign' => 'ALIGN_CENTER',
                            'vAlign' => 'ALIGN_MIDDLE',
                            'value' => function ($model, $key, $index, $widget) {
                                if ($model->status == '10') {
                                    return '<center><h4><span class="glyphicon glyphicon-ok-sign fa-5x" aria-hidden="true" style="color:green"></span></h4></center>';
                                } else {
                                    return '<center><h4><span class="glyphicon glyphicon-remove-sign  fa-lg" aria-hidden="true" style="color:red"></span></h4></center>';
                                }
                            },
                            'width' => '10%',
                            'filterWidgetOptions' => [
                                'showDefaultPalette' => false,
                            ],
                            'vAlign' => 'middle',
                            'format' => 'raw',
                        ],
                        [
                            'class' => 'kartik\grid\EditableColumn',
                            'attribute' => 'status',
                            'editableOptions' => [
                                'header' => 'Buy Amount',
                                'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX,
                                'options' => ['pluginOptions' => ['min' => 10, 'max' => 5000]]
                            ]],
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
                                                , 'data-confirm' => "ต้องการลบรายการของ " . $model->fullname . " ใช่หรือไม่?",
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
<?php
//PJax::end(); 
?>
