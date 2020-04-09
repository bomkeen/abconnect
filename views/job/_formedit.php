<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Customer;
use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;
?>

<div class="jobedit-form">
<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
<?= $form->field($model, 'job_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
<?= $form->field($model, 'etc')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
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

    <div class="row">
        <div class="col-md-3">
            <?=
            $form->field($model, 'customer_id')->dropDownList(
                    ArrayHelper::map(Customer::find()->all(), 'customer_id', 'customer_name')
                    , ['prompt' => 'รายชื่อลูกค้า']
            )
            ?>
        </div>
        <div class="col-md-1">
<?= $form->field($model, 'total_cost')->textInput() ?> 
        </div>
        
        <div class="col-md-2">
<?= $form->field($model, 'total_price')->textInput() ?> 
        </div>
        <div class="col-md-1">
<?= $form->field($model, 'total_vat')->textInput() ?> 
        </div>
        <div class="col-md-2">
<?= $form->field($model, 'total_profit')->textInput() ?> 
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'status')->radioList(array('n'=>'รอชำระ','y'=>'จ่ายแล้ว')); ?>
        </div>
        <div class="col-md-1">
            <div class="form-group">
<?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    
<?php ActiveForm::end(); ?>

</div>
