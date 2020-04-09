<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Customer;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;


$this->title = 'รายละเอียด Job';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {

    jQuery(".dynamicform_wrapper .panel-title-Product").each(function(index) {

        jQuery(this).html("JobDeatil: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {

    jQuery(".dynamicform_wrapper .panel-title-Product").each(function(index) {

        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>
<div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel panel-heading">
            <i class="glyphicon glyphicon-"></i>
            รายละเอียดงาน
        </div>
        <div class="panel panel-body">
<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
   <div class="row">
            <div class="col-md-12">
                <?= $form->field($modelJob, 'job_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($modelJob, 'etc')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                           <?=
                    $form->field($modelJob, 'customer_id')->dropDownList(
                            ArrayHelper::map(Customer::find()->all(), 'customer_id', 'customer_name')
                            , ['prompt' => 'รายชื่อลูกค้า']
                    )
                    ?>
           
            </div>
            <div class="col-md-6">
                        <?php
                echo $form->field($modelJob, 'job_date')->widget(DatePicker::ClassName(),
    [
    'name' => 'job_date', 
    'options' => ['placeholder' => 'Select date ...'],
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
    ]
]);?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($modelJob, 'total_cost')->textInput() ?> 
            </div>
            <div class="col-md-3 col-md-offset-3">
                <?= $form->field($modelJob, 'total_profit')->textInput() ?> 
            </div>
        </div>
       <div class="panel panel-default panel-danger">
        <div class="panel-heading"><i class="glyphicon glyphicon-list"></i> รายการสินค้า</div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsJobDetail[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'full_name',
                    'address_line1',
                    'address_line2',
                    'city',
                    'state',
                    'postal_code',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsJobDetail as $i => $modelJobDetail): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Product</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelJobDetail->isNewRecord) {
                                echo Html::activeHiddenInput($modelJobDetail, "[{$i}]job_detail_id");
                            }
                        ?>
                        <?= $form->field($modelJobDetail, "[{$i}]job_detail")->textInput(['maxlength' => true]) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelJobDetail, "[{$i}]product_detail")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelJobDetail, "[{$i}]cost")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                      
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($modelJobDetail->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
    </div>
</div>
</div>