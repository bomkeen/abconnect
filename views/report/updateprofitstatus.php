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
    <?php ActiveForm::end(); ?>

</div>
