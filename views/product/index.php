<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use app\models\ProductType;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = ['label' => 'Setting', 'url' => ['/setting/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .modal-header{
        /*background-color:yellow;*/
    }

</style>

<?php
Modal::begin([
    'header' => '<a href="#" class="btn btn-primary alert-primary" data-dismiss="modal">ปิด</a>',
    'id' => 'modal',
    'size' => 'modal-sg',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>'
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>

<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-3">
            <div class="well-lg">
                <?=
                Html::button('เพิ่มข้อมูล', [
                    'id' => 'modalcreate',
                    'value' => \yii\helpers\Url::to(['product/create'])
                    , 'class' => 'btn btn-lg btn-block btn-success createmodal'])
                ?> 
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'product_name',
//            'producttypename',
            [
                'attribute' => 'producttype',
                'value' => 'producttype.product_type_name'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
