<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\JobDetail */

$this->title = $model->job_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'กลับหน้า Job Edit', 'url' => ['job/edit', 'id' => $model->job_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
<div class="job-detail-view">

    <h1><?= Html::encode($model->job_detail) ?></h1>

    <p>
        <?php
        echo Html::button('แก้ไข', [
            'id' => 'modalcreate',
            'value' => \yii\helpers\Url::to(['job/editdetail', 'id' => $model->job_detail_id])
            , 'class' => 'btn   btn-success createmodal'])
        ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->job_detail_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'job_detail_id',
//            'job_id',
//            'job_detail',
//            'product_id',
            'product_detail',
            'cost',
            'price',
            'num',
            'total_cost',
            'total_price'
        ],
    ])
    ?>

</div>
