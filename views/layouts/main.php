<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'job', 'url' => ['/job'], 'visible' => @Yii::$app->user->identity->role=='Admin'],
            ['label' => 'Report', 'url' => ['/report'], 'visible' => @Yii::$app->user->identity->role=='Admin'],
//            ['label' => 'job detail', 'url' => ['/job-detail'], 'visible' => @Yii::$app->user->identity->role=='Admin'],
            Yii::$app->user->isGuest ?
//            Yii::$app->user->identity->id
//            Yii::$app->user->identity->role
['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login']] :
['label' => 'Account(' . Yii::$app->user->identity->fullname . ')', 'items'=>[
['label' => 'Profile', 'url' => ['/user/settings/profile']],
//    ['label' => 'Account', 'url' => ['/system-user/index']],
    ['label' => 'Logout', 'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']],
]],
['label' => 'ลงทะเบียน', 'url' => ['/system-user/register'], 'visible' => Yii::$app->user->isGuest],
// ['label' => 'gii', 'url' => ['/gii'], 'visible' => @Yii::$app->user->identity->role=='Admin'],         
['label' => 'SETTING', 'url' => ['/setting/index'], 'visible' => @Yii::$app->user->identity->role=='Admin'],
            
//            Yii::$app->user->isGuest ? (
//                    
//                ['label' => '<span>Login</span>' 
////                    ,'linkOptions'=>['class'=>'systemlogin','id'=>'systemlogin']
//                    ,'options'=> ['class'=>'systemlogin','id'=>'systemlogin']
//                    , 'url' => ['/site/login'],'data-tag'=>'yii2-menu'
//                ]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
        ],
        
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; AB Soft <?= 2019 ?></p>

        <!--<p class="pull-right"><?= Yii::powered() ?></p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
Modal::begin([
    'header' => 'เข้าสู่ระบบ',
    'id' => 'modal',
    'size' => 'modal-sg',
]);
echo "<div id='modalContent'></div>";
Modal::end();

?>