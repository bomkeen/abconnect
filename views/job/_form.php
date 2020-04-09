<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Customer;
use app\models\Product;
use app\models\Model;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;
?>

<div class="job-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'job_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'etc')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?=
            $form->field($model, 'customer_id')->dropDownList(
                    ArrayHelper::map(Customer::find()->all(), 'customer_id', 'customer_name')
                    , ['prompt' => 'รายชื่อลูกค้า']
            )
            ?>

        </div>
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'job_date')->widget(DatePicker::ClassName(), [
                'name' => 'job_date',
                'options' => ['placeholder' => 'Select date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
