<html>
    <head>

    </head>
    <body>
        <img src="../img/logo.png"  style="width:200px;height:65px;">
        <br></br>
        <!--<div style="text-align: right">Date: 13th November 2008</div>-->
        <table class="address" width="100%"  cellpadding="10">
            <tr>
                <td colspan="2" align='right' >
                    <?php
                    include_once '../inc/thaidate.php';
                    echo thaidate(date("Y-m-d"));
                    ?>
                </td>
            </tr>
            <tr>
                <td width="50%"  valign='top'>
                    <!--<span style="font-size: 7pt; color: #555555; font-family: Garuda;">ผู้ขาย :</span>-->
                    abconnect โดย นายพีรกาจ พูลสวัสดิ์
                    <br/>
                    166 หมู่ที่ 5 ตำบลนครหลวง อำเภอนครหลวง
                    <br/>จังหวัดพระนครศรีอยุธยา 13260
                    <br/>โทร 083-9643666 , 065-3939425
                    <br/>เลขประจำตัวผู้เสียภาษี : 3140300265411
                </td>
                <!--<td width="20%" style="border: 0.1mm solid #888888;">&nbsp;</td>-->
                <td width="50%" align="right">
                    345 Anotherstreet<br />
                    Little Village<br />Their City
                    <br />CB22 6SO</td>
            </tr>
        </table>
        <br />

                 <table class="items"  width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
                    <thead>
                        <tr>
                            <td width="70%">รหัสสินค้า/รายละเอียดสินค้า</td>
                            <td width="10%">จำนวน</td>
                            <td width="10%">ราคาต่อหน่วย</td>
                            <td width="10%">จำนวนเงินรวม</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ITEMS HERE -->


                        <!--buttom tabel-->
                    <div class="breakline"></div>

                    <tr>
                        <td align="left">
                            MF1234567
                        </td>
                        <td align="center">
                            10<br>50
                        </td>
                        <td align='center'>
                            100
                        </td>
                        <td class="cost">
                            &pound;2.56
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td align='center'>
                                รวม 
                            </td>
                            <td colspan="3" align='center'>
                                1500  
                            </td>
                        </tr>              
                    </tfoot>
                </table>
        

        



    </body>


</html>