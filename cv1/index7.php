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
    /*border-radius: 75%;*/
    border-top: 5px solid #02B4E2;
    border-left: 5px solid #02B4E2;
}
.thong-tin-ho-so ul {
    list-style-type: none;
  margin: 0;
  padding: 0;
}
</style>
    <div class="container" id="html-content-holder" style="width: 820px;border: 1px solid #000;padding: 30px 40px 40px 40px;min-height: 1000px;">
        <div class="row" style="margin-left: 0;margin-right: 0;">
            <div class="col-md-2" style="padding-left: 0;padding-right: 0;">
                <img src="/images/<?= $ung_vien['image']!='' ? $ung_vien['image'] : 'no-photo.png' ?>" alt="" class="img-ho-so responsive" hrelation="1">
            </div>
            <div class="col-md-4" style="padding-top: 20px;">
                <p>Họ và tên: <?= $ung_vien['name'] ?></p>
                <p>Số điện thoại: <?= $ung_vien['phone'] ?></p>
                <p>Email: <?= $ung_vien['email'] ?></p>
            </div>
            <div class="col-md-6" style="padding-top: 20px;">
                <p>Giới tính: <?= $ung_vien['sex']==1 ? 'Nam' : 'Nữ' ?></p>
                <p>Ngày sinh: <?= date('d-m-Y', strtotime($ung_vien['birthday'])) ?></p>
                <p>Địa chỉ: <?= $ho_so['address'] ?></p>
            </div>
        </div>
        <div class="row" style="margin-left: 0;margin-right: 0;">
            <p style="background: #02B4E2;color:#fff;font-size: 17px;text-transform: uppercase;text-align: center;padding: 8px;margin-top: 5px;"><?= $ho_so['position'] ?></p>
        </div>
        <div class="row" style="margin-left: 0;margin-right: 0;">
            <div class="col-md-2" style="padding-left: 0;padding-right: 0;">
                <h2 style="margin: 0 5px;font-size: 16px;text-align: right;text-transform: uppercase;font-weight: bold;color: #60B2CA;">Thông tin hô sơ</h2>
            </div>
            <div class="col-md-10">
                <div class="thong-tin-ho-so">
                <?php 
                    if ($ung_vien['type'] == 0) {
                        include dirname(__FILE__) . "/../template/others/MS_OTHER_VIECLAM_0001.php";
                    } else {
                        include dirname(__FILE__) . "/../template/others/MS_OTHER_VIECLAM_0002.php";
                    }
                    ?> 
            </div>
            </div>
        </div>
        <hr style="border-top: 2px solid #60B2CA;">
        <div class="row" style="margin-left: 0;margin-right: 0;">
            <div class="col-md-2" style="padding-left: 0;padding-right: 0;">
                <h2 style="margin: 0 5px;font-size: 16px;text-align: right;text-transform: uppercase;font-weight: bold;color: #60B2CA;">Mục tiêu nghề nghiệp</h2>
            </div>
            <div class="col-md-10">
                <?php
                            $thong_tin_item = str_replace("\r\n", "<br>", $ho_so['muc_tieu']);
                            echo $thong_tin_item ;
                            ?>
            </div>
        </div>
        <hr style="border-top: 2px solid #60B2CA;">
        <div class="row" style="margin-left: 0;margin-right: 0;">
            <div class="col-md-2" style="padding-left: 0;padding-right: 0;">
                <h2 style="margin: 0 5px;font-size: 16px;text-align: right;text-transform: uppercase;font-weight: bold;color: #60B2CA;">Kinh nghiêm làm việc</h2>
            </div>
            <div class="col-md-10">
                <?php
                            $thong_tin_work = str_replace("\r\n", "<br>", $ho_so['work_progress']);
                            echo $thong_tin_work ;
                            ?>
            </div>
        </div>
        <hr style="border-top: 2px solid #60B2CA;">
        <div class="row" style="margin-left: 0;margin-right: 0;">
            <div class="col-md-2" style="padding-left: 0;padding-right: 0;">
                <h2 style="margin: 0 5px;font-size: 16px;text-align: right;text-transform: uppercase;font-weight: bold;color: #60B2CA;">Kỹ năng<br> bản thân</h2>
            </div>
            <div class="col-md-10">
                <?php
                            $thong_tin_skill = str_replace("\r\n", "<br>", $ho_so['skill']);
                            echo $thong_tin_skill ;
                            ?>
            </div>
        </div>
        <hr style="border-top: 14px solid #02B4E2;">
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