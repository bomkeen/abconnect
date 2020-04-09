<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobDetailListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-detail-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'job_detail_list_id') ?>

    <?= $form->field($model, 'job_detail_id') ?>

    <?= $form->field($model, 'line1') ?>

    <?= $form->field($model, 'line2') ?>

    <?= $form->field($model, 'line3') ?>

    <?php // echo $form->field($model, 'line4') ?>

    <?php // echo $form->field($model, 'line5') ?>

    <?php // echo $form->field($model, 'line6') ?>

    <?php // echo $form->field($model, 'line7') ?>

    <?php // echo $form->field($model, 'line8') ?>

    <?php // echo $form->field($model, 'line9') ?>

    <?php // echo $form->field($model, 'line10') ?>

    <?php // echo $form->field($model, 'waranty') ?>

    <?php // echo $form->field($model, 'user_create') ?>

    <?php // echo $form->field($model, 'user_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
