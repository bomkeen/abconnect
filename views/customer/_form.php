<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'add_line1')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'add_line2')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'add_line3')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'customer_detail')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
