<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JobDetailList */

$this->title = $model->job_detail_list_id;
$this->params['breadcrumbs'][] = ['label' => 'Job Detail Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="job-detail-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->job_detail_list_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->job_detail_list_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'job_detail_list_id',
            'job_detail_id',
            'line1',
            'line2',
            'line3',
            'line4',
            'line5',
            'line6',
            'line7',
            'line8',
            'line9',
            'line10',
            'waranty',
            'user_create',
            'user_update',
        ],
    ]) ?>

</div>
