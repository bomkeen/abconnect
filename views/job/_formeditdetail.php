<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'job_detail')->textInput() ?>

    <?= $form->field($model, 'product_detail')->textInput() ?>
   
    <?= $form->field($model, 'cost')->textInput(['style'=>'width:30%;']) ?>
    <?= $form->field($model, 'price')->textInput(['style'=>'width:30%;']) ?>
  
    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
