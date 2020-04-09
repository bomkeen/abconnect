<?php
//use yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
//use app\models\Department;
use yii\helpers\ArrayHelper;
use app\models\SystemUser;
use app\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model app\models\Helpdeskuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="helpdeskuser-form">
<?php  $role= Yii::$app->user->identity->role ;
//echo $role;

?>
    <?php $form = ActiveForm::begin(); ?>
    
        <div class="row">
            <div class="col-sm-6">
                
                    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-sm-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
             <?php echo $form->field($model, 'password')->passwordinput() ?>
        </div>
         <div class="col-sm-6">
<?php
if($role === 'Admin'): ?>
        <?= $form->field($model, 'role')->dropDownList(
         ArrayHelper::map(AuthItem::find()->all(), 'name', 'name')
        , ['prompt' => 'ระดับการเข้าใช้งาน' ]
            ) ?>
   <?php endif; ?>
  

            

        </div>
    </div>
    
    
       <?php  
//            $form->field($model, 'hosinfo_department_id')->widget(Select2::classname(), [
//    'language' => 'th',
//    'data' => ArrayHelper::map(Department::find()->all(), 'depcode', 'depname'),
//    'options' => ['placeholder' => 'เลือกแผนก'],
//    'pluginOptions' => [
//        'allowClear' => true
//    ],
//]);
?>
    
    
   


 
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
    <div class="form-group">
        <?= Html::submitButton('บันทึกข้อมูล', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary']) ?>
    </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
