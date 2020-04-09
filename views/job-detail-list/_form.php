<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobDetailList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-detail-list-form">

    <?php $form = ActiveForm::begin(); ?>

    
<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
 
       <?= $form->field($model, 'waranty')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'line1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line8')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line9')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line10')->textInput(['maxlength' => true]) ?>

 

   

    

    <?php ActiveForm::end(); ?>

</div>
