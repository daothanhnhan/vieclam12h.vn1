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
    border-radius: 75%;
}
.thong-tin-ho-so ul {
    list-style-type: none;
  margin: 0;
  padding: 0;
}
</style>
    <div class="container" id="html-content-holder" style="width: 911px;border: 1px solid #000;padding: 40px;min-height: 1100px;">
        <div class="row">
            <div class="col-md-3">
                <div style="border: 3px solid #246B81;border-radius: 80%;">
                    <img src="/images/<?= $ung_vien['image']!='' ? $ung_vien['image'] : 'no-photo.png' ?>" alt="" class="img-ho-so responsive" hrelation="1">
                </div>
                
            </div>
            <div class="col-md-9" style="margin-top: 27px;">
                <div class="row">
                    <div class="col-md-6"><h1 style="color:#246B81;font-size: 32px;margin-bottom: 0;"><?= $ung_vien['name'] ?></h1></div>
                    <div class="col-md-6"><p style="color: #246B81;text-align: right;text-transform: uppercase;font-weight: bold;font-size: 12px;margin-top: 36px;margin-right: 0;"><?= $ho_so['position'] ?></p></div>
                </div>
                <hr style="width: 106%;border-top: 4px solid #246B81;margin-bottom: 8px;margin-left: -30px;margin-top: 0;">
                <div class="row">
                    <div class="col-md-6">
                        <p style="color: #000;"><i class="fa fa-phone icon_left" style=""></i> <?= $ung_vien['email'] ?></p>
                    </div>
                    <div class="col-md-6">
                        <p style="color: #000;"><i class="fa fa-envelope-o icon_left" style=""></i> <?= $ung_vien['phone'] ?></p>
                    </div>
                    <div class="col-md-12">
                        <p style="color: #000;"><i class="fa fa-map-marker icon_left" style=""></i> <?= $ho_so['address'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-right: 0;margin-left: 0;">
            <h2 style="color: #246B81;text-transform: uppercase;font-size: 28px;">Thông tin hồ sơ</h2>
            <hr style="margin-top: 0;margin-bottom: 10px;border-top: 3px solid #CCCCCC;">
            <div class="thong-tin-ho-so">
                <?php 
                    if ($ung_vien['type'] == 0) {
                        include dirname(__FILE__) . "/../template/others/MS_OTHER_VIECLAM_0001.php";
                    } else {
                        include dirname(__FILE__) . "/../template/others/MS_OTHER_VIECLAM_0002.php";
                    }
                    ?> 
            </div>
            <h2 style="color: #246B81;text-transform: uppercase;font-size: 28px;">Mục tiêu nghề nghiệp</h2>
            <hr style="margin-top: 0;margin-bottom: 10px;border-top: 3px solid #CCCCCC;">
            <p style="color: #000;">
                        <?php
                            $thong_tin_item = str_replace("\r\n", "<br>", $ho_so['muc_tieu']);
                            echo $thong_tin_item ;
                            ?>
                    </p>
            
            <h2 style="color: #246B81;text-transform: uppercase;font-size: 28px;">Kinh nghiệm làm việc</h2>
            <hr style="margin-top: 0;margin-bottom: 10px;border-top: 3px solid #CCCCCC;">
            <p>
                            <?php
                            $thong_tin_work = str_replace("\r\n", "<br>", $ho_so['work_progress']);
                            echo $thong_tin_work ;
                            ?></p>
            <h2 style="color: #246B81;text-transform: uppercase;font-size: 28px;">Kỹ năng của bản thân</h2>
            <hr style="margin-top: 0;margin-bottom: 10px;border-top: 3px solid #CCCCCC;">
            <p>
                            <?php
                            $thong_tin_skill = str_replace("\r\n", "<br>", $ho_so['skill']);
                            echo $thong_tin_skill ;
                            ?>     
                        </p>
        </div>
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