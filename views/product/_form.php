<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ProductType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_name')->textInput() ?>

    <?=
    $form->field($model, 'product_type_id')->dropDownList(
            ArrayHelper::map(ProductType::find()->all(), 'product_type_id', 'product_type_name')
            , ['prompt' => 'Product Type']
    )
    ?>

    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
