<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JobDetail */

$this->title = 'Update Job Detail: ' . $model->job_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Job Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->job_detail_id, 'url' => ['view', 'id' => $model->job_detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
