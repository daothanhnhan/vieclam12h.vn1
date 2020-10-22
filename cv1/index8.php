<?php 
    include_once dirname(__FILE__) . "/../functions/database.php";
    include_once dirname(__FILE__) . "/../functions/library.php";
    include_once dirname(__FILE__) . "/../functions/action.php";

    $action = new action();

    $ung_vien = $action->getDetail('ung_vien', 'id', $_GET['id']);//var_dump($ung_vien);
    $ho_so = $action->getDetail('ho_so', 'ung_vien_id', $ung_vien['id']);
    // $kinhnghiem = $action->getDetail('ex');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CV</title>
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" href=""> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="/css/style-ruouvang.css"> -->
    <!-- <link href="https://doannguyennet.github.io/iconsfont/linearicons.min.css" rel="stylesheet"/> -->
    <link href="/cv1/style.css" rel="stylesheet"/>
    <link href="/cv1/style1.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/plugin/fonts/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="/cv1/build/new/html2canvas.js"></script>
    <script type="text/javascript" src="/cv1/jquery.responsiveheight.js"></script>
</head>
<body>
<style>
.img-ho-so {
    width: 100%;

}
.thong-tin-ho-so ul {
    list-style-type: none;
  margin: 0;
  padding: 0;
}
.icon_left {
    border-radius: 11%;
    padding: 5px;
    background: #02A18B;
    color: #fff;
}
</style>
    <div class="container" id="html-content-holder" style="width: 780px;border: 1px solid #000;padding-top: 40px;">
        <div class="row" style="background: #02A18B;text-align: right;height: 35px;">
            <span style="background: #fff;margin-right: 20px;color: #02A18B;font-size: 16px;text-transform: uppercase;padding: 10px 5px;position: relative;top: 7px;"><?= $ho_so['position'] ?></span>
        </div>
        <div style="padding: 0 40px 40px 40px">
            <h1 style="color: #02A18B;text-transform: uppercase;"><?= $ung_vien['name'] ?></h1>
            <div class="row">
                <div class="col-md-9">
                    <p style="color: #000;"><i class="fa fa-intersex icon_left" style=""></i> Giới tính: <?= $ung_vien['sex']==1 ? 'Nam' : 'Nữ' ?></p>
                    <p style="color: #000;"><i class="fa fa-birthday-cake icon_left" style=""></i> Ngày sinh: <?= date('d-m-Y', strtotime($ung_vien['birthday'])) ?></p>
                    <p style="color: #000;"><i class="fa fa-phone icon_left" style=""></i> Số điện thoại: <?= $ung_vien['phone'] ?></p>
                    <p style="color: #000;"><i class="fa fa-map-marker icon_left" style=""></i> Địa chỉ: <?= $ho_so['address'] ?></p>
                    <p style="color: #000;"><i class="fa fa-envelope-o icon_left" style=""></i> Email: <?= $ung_vien['email'] ?></p>
                </div>
                <div class="col-md-3">
                    <img src="/images/<?= $ung_vien['image']!='' ? $ung_vien['image'] : 'no-photo.png' ?>" alt="" class="img-ho-so responsive" hrelation="1">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color: #02A18B;font-size: 17px;text-transform: uppercase;">Thông tin hồ sơ</h2>
                    <div class="thong-tin-ho-so">
                        <?php 
                            if ($ung_vien['type'] == 0) {
                                include dirname(__FILE__) . "/../template/others/MS_OTHER_VIECLAM_0001.php";
                            } else {
                                include dirname(__FILE__) . "/../template/others/MS_OTHER_VIECLAM_0002.php";
                            }
                            ?> 
                    </div>
                    <h2 style="color: #02A18B;font-size: 17px;text-transform: uppercase;">Mục tiêu nghề nghiệp</h2>
                    <p style="color: #000;">
                        <?php
                            $thong_tin_item = str_replace("\r\n", "<br>", $ho_so['muc_tieu']);
                            echo $thong_tin_item ;
                            ?>
                    </p>
                    <h2 style="color: #02A18B;font-size: 17px;text-transform: uppercase;">Kinh nghiệm làm việc</h2>
                    <p>
                            <?php
                            $thong_tin_work = str_replace("\r\n", "<br>", $ho_so['work_progress']);
                            echo $thong_tin_work ;
                            ?></p>
                    <h2 style="color: #02A18B;font-size: 17px;text-transform: uppercase;">Kỹ năng của bản thân</h2>
                    <p>
                            <?php
                            $thong_tin_skill = str_replace("\r\n", "<br>", $ho_so['skill']);
                            echo $thong_tin_skill ;
                            ?>     
                        </p>
                </div>
            </div>
        </div>
        <hr style="border-top: 30px solid #02A18B;">
    </div>
    <br/>
<div style="text-align: center;">
    <input id="btn-Preview-Image" type="button" value="Preview"/>
    <a id="btn-Convert-Html2Image" href="#">Download</a>
    <br/>
    <h3>Preview :</h3>
    <div id="previewImage" style="display: ;">
    </div>
</div>





<script>
$(document).ready(function(){

    
var element = $("#html-content-holder"); // global variable
var getCanvas; // global variable
 
    $("#btn-Preview-Image").on('click', function () {
         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                getCanvas = canvas;
                // document.getElementById("btn-Convert-Html2Image").click();
             }
         });
    });

    $("#btn-Convert-Html2Image").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", "info_cv.png").attr("href", newData);
    });

});

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.responsive').responsiveheight();
    });
</script>
</body>
