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