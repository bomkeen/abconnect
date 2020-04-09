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
        <div class="panel-body">
            <div class="row">

                <div class="col-xs-12 col-md-12">
                    <a href="#" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Apps</a>
                    <a href="#" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-bookmark"></span> <br/>Bookmarks</a>
                    <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>Reports</a>
                    <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>Comments</a>
                </div>


            </div>
        </div>
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