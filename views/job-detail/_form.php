<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Product;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
?>

<div class="job-detail-form">
    <?php $form = ActiveForm::begin([
        'options' => ['name' => 'fdetail']
    ]); ?>
    <?= $form->field($model, 'job_detail')->textInput()->label('รายการสินค้า') ?>
    <?= $form->field($model, 'product_detail')->textInput()->label('link สินค้า') ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'cost')->textInput(['id'=>'detail-cost'])->label('ต้นทุน') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'price')->textInput(['id'=>'detail-price'])->label('ราคาขาย') ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'num')->textInput(['id'=>'detail-num']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'total_cost')->textInput(['id'=>'detail-total_cost']) ?>  
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'total_price')->textInput(['id'=>'detail-total_price']) ?> 
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    
    <?php 
 $this->registerJs('$("#detail-num").change(function () {
    document.getElementById("detail-total_cost").value=$("#detail-cost").val() * $("#detail-num").val() ;
    document.getElementById("detail-total_price").value=$("#detail-price").val() * $("#detail-num").val() ;
});');
        
    ?>
</div>


