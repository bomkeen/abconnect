<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JobDetailListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Detail Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-detail-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Job Detail List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'job_detail_list_id',
            'job_detail_id',
            'line1',
            'line2',
            'line3',
            //'line4',
            //'line5',
            //'line6',
            //'line7',
            //'line8',
            //'line9',
            //'line10',
            //'waranty',
            //'user_create',
            //'user_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
