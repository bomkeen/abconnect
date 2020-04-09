<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Job */

$this->title = 'สร้างใบงาน';
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php

    ?>
    <?php
    echo $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
