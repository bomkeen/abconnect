<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JobDetail */

$this->title = 'เพิ่มรายการ';
$this->params['breadcrumbs'][] = ['label' => 'Job Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>
<?php
//echo $id;
?>
    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id
    ]) ?>

</div>
