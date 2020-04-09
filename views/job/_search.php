<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'job_id') ?>

    <?= $form->field($model, 'job_name') ?>

    <?= $form->field($model, 'etc') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'total_cost') ?>

    <?php // echo $form->field($model, 'total_profit') ?>

    <?php // echo $form->field($model, 'job_date') ?>

    <?php // echo $form->field($model, 'job_update_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
