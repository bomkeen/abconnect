<?php 
use yii\bootstrap\Modal;
?>

<?php
Modal::begin([
    'header' => 'เข้าสู่ระบบ',
    'id' => 'modal',
    'size' => 'modal-sg',
]);
echo "<div id='modalContent'></div>";
Modal::end();

?>


<div class="row">
    <br/>
    <center>
    <img style="opacity:0.2;filter:alpha(opacity=20)"ท src="../img/logo.png" class="img-responsive img-rounded" alt="Responsive image"/>
    </center>
</div>