<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobDetailList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-detail-list-form">

    <?php $form = ActiveForm::begin(); ?>

 <?= $form->field($model, 'profit_status')->radioList(array('0'=>'รอแบ่ง','1'=>'แบ่งแล้ว')); ?>   
<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
 
       
    <?php ActiveForm::end(); ?>

</div>
