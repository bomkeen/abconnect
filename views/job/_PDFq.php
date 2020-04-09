<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dialog\Dialog;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\web\JsExpression;
?>

<html>
    <head>
        <link href="../inc/pdf.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <h2>ใบเสนอราคา</h2>
        </header>

        <img src="../img/logo.png"  style="width:200px;height:65px;float: left;">
        <!--<p>ใบเสร็จ</p>-->
        <br></br>
        <!--<div style="text-align: right">Date: 13th November 2008</div>-->
        <table class="address" width="100%"  cellpadding="10">
            <tr>
                <td colspan="2" align='right' >
                    เลขที่ : ABQ<?php echo $job->doc_num; ?>
                    <?php
                    include_once '../inc/thaidate.php';
                    include_once '../inc/bathtext.php';
//                    echo thaidate(date("Y-m-d"));
                    ?>
                </td>
            </tr>
            <tr>
                <td width="50%"  valign='top'>
                    <!--<span style="font-size: 7pt; color: #555555; font-family: Garuda;">ผู้ขาย :</span>-->
                    ร้าน abconnect โดย นายพีรกาจ พูลสวัสดิ์
                    <br/>
                    166 หมู่ที่ 5 ตำบลนครหลวง อำเภอนครหลวง
                    <br/>จังหวัดพระนครศรีอยุธยา 13260
                    <br/>โทร 083-9643666 , 065-3939425
                    <br/>เลขประจำตัวผู้เสียภาษี : 3140300265411
                </td>
                <!--<td width="20%" style="border: 0.1mm solid #888888;">&nbsp;</td>-->
                <td width="50%" align="right" >
                    ลูกค้า : <?php echo $cus->customer_name; ?><br />
                    <?php echo $cus->add_line1; ?><br />
                    <?php echo $cus->add_line2; ?>
                    <br /><?php echo $cus->add_line3; ?><br/>
                    โทรศัพท์ : <?php echo $cus->tel; ?>
                </td>
            </tr>
        </table>
        <p style="text-align: right">วันที่ : .................................</p>
        <table class="items"  width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
            <thead>
                <tr>
                    <td width="68%">รหัสสินค้า/รายละเอียดสินค้า</td>
                    <td width="8%">จำนวน</td>
                    <td width="12%">ราคาต่อหน่วย</td>
                    <td width="12%">จำนวนเงินรวม</td>
                </tr>
            </thead>
            <tbody>
                <!-- ITEMS HERE -->


                <!--buttom tabel-->
            <div class="breakline"></div>
            <tr><td></td><td></td><td></td><td></td></tr>
            <?php
            $list = 0;
            if (!empty($model)) {

                foreach ($model as $job_detail) {

                    echo '<tr><td align = "left">';
                    echo $job_detail->job_detail;
                    echo '</td>
        <td align = "center">';
                    echo $job_detail->num;
                    echo '</td>
        <td align = "right">';
                    echo number_format($job_detail->price, 0, '.', ',');
                    echo '</td>
        <td align = "right">';
                    echo number_format($job_detail->total_price, 0, '.', ',');
                    echo '</td></tr>  <div class="breakline"></div>';
                    
//                    รายระเอียดรายการ
                    $job_detail_list = \app\models\JobDetailList::find()->where(['job_detail_id' => $job_detail->job_detail_id])->one();

                    if (!empty($job_detail_list)) {
                        for ($n = 1; $n <= 10; $n++) {
                            $line = 'line' . $n;
                            if (!empty($job_detail_list->$line)) {
                                echo '<tr><td align = "left">';
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-';
                                echo $job_detail_list->$line;
                                echo '</td><td></td><td></td><td></td></tr>  <div class="breakline"></div>';
                                $list = $list + 1;
                            }
                        }
                        if (!empty($job_detail_list->waranty)) {
                            echo '<tr><td align = "left" ><font color="red">';
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- สินค้ารับประกัน';
                            echo $job_detail_list->waranty;
                            echo '</font></td><td></td><td></td><td></td></tr>  <div class="breakline"></div>';
                            $list = $list + 1;
                        }
                    }
//                    จบรายละเอียด
                }
            }
            ?>
            <?php
            $line = 22;
            $row = count($model) + $list;
            $loob = $line - $row;
            for ($i = 0; $i <= $loob; $i++) {
                echo " <tr><td></td><td></td><td></td><td></td></tr>";
            }
            ?>
           
        </tbody>
        <tfoot>
            <tr>
                <td align='center'>
                    <?php echo bathtext($job->total_price); ?>
                </td>
                <td colspan="2">
                    รวมมูลค่าสินค้า
                </td>
                <td  align='right'>
                    <?php echo number_format($job->total_price, 0, '.', ','); ?>
                </td>
            </tr>              
        </tfoot>
    </table>

    <br/>
    <div class="box-right">
        <p style="text-align: center ; font-size: 12pt;">อนุมัติโดย</p>
        <br/>
        <p style="text-align: center">..................................</p>
        <br/>
        <p style="text-align: center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)      
            <?php //echo "นาย ". Yii::$app->user->identity->fullname     ?></p>

    </div>

</body>


</html>