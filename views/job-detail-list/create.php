<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JobDetailList */

$this->title = 'เพิ่มรายละเอียดรายการ';
$this->params['breadcrumbs'][] = ['label' => 'Job Detail Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-detail-list-create">


    <div class="row">
        <div class="col-md-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-4" >
            <?=
            Html::a('ลบรายการ', ['delete', 'id' => $model->job_detail_list_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>

    </div>
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?> 




</div>
