<?php
/* @var $this yii\web\View */
?>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>ระบบรายงาน</h3>
            <?php echo 'เข้าระบบโดย :: ' . Yii::$app->user->identity->fullname;
            ?>
        </div>
        <?php if(@Yii::$app->user->identity->id==55){ ?>
        
        <div class="panel-body">
            <div class="row">

                <div class="col-xs-3 col-md-offset-2  col-md-2">
                    <a href="#" class="btn btn-danger btn-lg" role="button">
                        <span class="glyphicon glyphicon-piggy-bank">

                        </span> <br/><?php echo $total_vat ;?><br/>ภาษีสะสม</a>
                </div>
                <div class="col-xs-3 col-md-2">
                    <a href="#" class="btn btn-warning btn-lg" role="button">
                        <span class="glyphicon glyphicon-bookmark"></span> <br/><?php echo $total_cost ; ?><br/>ทุนรวม</a>
                </div>
                <div class="col-xs-3 col-md-2">
                        <a href="#" class="btn btn-primary btn-lg" role="button">
                        <span class="glyphicon glyphicon-signal"></span><br/> <?php echo $total_profit ;?> <br/>กำไรสะสม</a>
                    
                </div>
                <div class="col-md-4  col-xs-6">
                    <form class="form-inline"id="form1" name="form1" method="post" >

                        <select class="form-control" name="year" id="year">
                            <?php
                            $list = date('Y');
                            for ($i = 0; $i <= 5; $i++) {
                                $l = $list - $i;
                                $th = $l + 543;
                                ?>
                                <option value="<?= $l; ?>"  <?php if ($l == $y) echo 'selected'; ?> >ข้อมูลของปี <?= $th; ?></option>
                            <?php } ?>

                        </select>
                     
                        <input type="hidden" name="form1" id="form1" value="true" />
                        <input class="btn btn-success" type="submit" name="Submit" value="แสดงข้อมูล" />
                    </form>
                </div>


            </div>
        </div>
        
        <?php } ?>
        <!--        <div class="panel-footer text-right">
                    <h5>bomkeen dev 2018</h5>
                </div>-->
    </div>
    <div class="panel panel-info">

        <div class="panel-body">
            <div class="row">

                <div class="col-md-3">
                    <a class="btn btn-lg btn-block btn-success" href="index.php?r=report/profitforyou">
                        <span class="glyphicon glyphicon-user"></span>รายงานการแบ่งเงิน</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-lg btn-block btn-success" href="index.php?r=customer">
                        <span class="glyphicon glyphicon-grain"></span> ข้อมูลลูกค้า</a>
                </div>
                <!--                <div class="col-md-3">
                                    <a class="btn btn-lg btn-block btn-success" href="index.php?r=product">
                                        <span class="glyphicon glyphicon-bed"></span> ข้อมูลสินค้า</a>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-lg btn-block btn-success" href="index.php?r=product-type">
                                        <span class="glyphicon glyphicon-th"></span> ประเภทสินค้า</a>
                                </div>-->
            </div>
        </div>
        <!--        <div class="panel-footer text-right">
                    <h5>bomkeen dev 2018</h5>
                </div>-->
    </div>

</div>