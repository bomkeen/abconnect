<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SystemUser */

$this->title = 'สร้างผู้ใช้งานรายใหม่';
$this->params['breadcrumbs'][] = ['label' => 'System Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-user-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
