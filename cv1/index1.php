<?php 
    include_once dirname(__FILE__) . "/../functions/database.php";
    include_once dirname(__FILE__) . "/../functions/library.php";
    include_once dirname(__FILE__) . "/../functions/action.php";

    $action = new action();

    $ung_vien = $action->getDetail('ung_vien', 'id', $_GET['id']);//var_dump($ung_vien);
    $ho_so = $action->getDetail('ho_so', 'ung_vien_id', $ung_vien['id']);
    // $kinhnghiem = $action->getDetail('ex');
    if (!isset($_GET['color'])) {
        $color = "#655643";
        $color1 = "#7f6d58";
    } else {
        if ($_GET['color']==1) {
            $color = "#655643";
            $color1 = "#7f6d58";
        }
        if ($_GET['color']==2) {
            $color = "#069974";
            $color1 = "#28BC9C";
        }
        if ($_GET['color']==3) {
            $color = "#286898";
            $color1 = "#3281BC";
        }
    }
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
.icon_left {
    border-radius: 10%;
    padding: 5px;
    background: <?= $color ?>;
    /*color: #fff;*/
}
.icon_right {
    font-size: 28px;
    border-radius: 22%;
    background: <?= $color ?>;
    padding: 7px;
    color: #fff;
}
.muc-tieu {
    font-size: 16px;
    text-transform: uppercase;
    color: #fff;
    font-weight: bold;
    /*text-align: center;*/
}
.title-right {
    font-size: 24px;
    text-transform: uppercase;
    font-weight: bold;
}
.info-right-hoso ul {
    list-style-type: none;
  margin: 0;
  padding: 0;
}
.title-right-margin {
    margin: 10px 0;
}
.img-ho-so {
    width: 100%;
    border-radius: 100%;
    margin-top: 20px;
}
</style>
	<div class="container" id="html-content-holder" style="width: 780px;border: 0px solid #000;">
		<div class="row">
			<div class="col-md-4" style="width: 30%;padding: 0;">
				<div style="background: <?= $color ?>;" class=" col-md-12">
                    <div style="border-radius: 50%;">
                        <img src="/images/<?= $ung_vien['image']!='' ? $ung_vien['image'] : 'no-photo.png' ?>" alt="" class="img-ho-so responsive" hrelation="1" style="">
                    </div>
					
					<h1 style="font-size: 22px;text-transform: uppercase;text-align: center;color: #fff;font-weight: bold;"><?= $ung_vien['name'] ?></h1>
					<p style="color: #fff;text-align: center;font-style: italic;"><?= $ho_so['position'] ?></p>
				</div>
				<div style="background: <?= $color1 ?>;padding-top: 20px;min-height: 500px;" class=" col-md-12">
                    <p style="color: #fff;"><i class="fa fa-calendar icon_left" style=""></i> <?= date('d/m/Y', strtotime($ung_vien['birthday'])) ?></p>
                    <p style="color: #fff;"><i class="fa fa-user icon_left" style=""></i> <?= $ung_vien['sex']==1 ? 'Nam' : 'Nữ' ?></p>
                    <p style="color: #fff;"><i class="fa fa-phone icon_left" style=""></i> <?= $ung_vien['email'] ?></p>
                    <p style="color: #fff;"><i class="fa fa-envelope-o icon_left" style=""></i> <?= $ung_vien['phone'] ?></p>
					<p style="color: #fff;"><i class="fa fa-map-marker icon_left" style=""></i> <?= $ho_so['address'] ?></p>
                    <h2 class="muc-tieu">Mục tiêu nghề nghiệp</h2>
                    <p style="color: #fff;">
                        <?php
                            $thong_tin_item = str_replace("\r\n", "<br>", $ho_so['muc_tieu']);
                            echo $thong_tin_item 
                            ?>
                    </p>
				</div>
			</div>
			<div class="col-md-8 info-right-hoso" style="width: 70%;padding: 20px;">
				<p class="title-right-margin"><i class="fa icon-bookmark icon_right" aria-hidden="true" style="padding: 7px 7px;"></i> <span class="title-right">Thông tin hồ sơ</span></p>
                <?php 
                        if ($ung_vien['type'] == 0) {
                            include dirname(__FILE__) . "/../template/others/MS_OTHER_VIECLAM_0001.php";
                        } else {
                            include dirname(__FILE__) . "/../template/others/MS_OTHER_VIECLAM_0002.php";
                        }
                        ?> 
                <p class="title-right-margin"><i class="fa fa-clock-o icon_right" aria-hidden="true" style="padding: 7px 9px;"></i> <span class="title-right">Kinh nghiệm làm việc</span></p>
                <p>
                            <?php
                            $thong_tin_work = str_replace("\r\n", "<br>", $ho_so['work_progress']);
                            echo $thong_tin_work 
                            ?></p>
                <p class="title-right-margin"><i class="fa fa-key icon_right" aria-hidden="true" style=""></i> <span class="title-right">Kỹ năng của bản thân</span></p>
                <p>
                            <?php
                            $thong_tin_skill = str_replace("\r\n", "<br>", $ho_so['skill']);
                            echo $thong_tin_skill 
                            ?>     
                        </p>
			</div>
		</div>
	</div>
    <div style="text-align: center;margin-top: 20px;" class="row">
        <a href="index1.php?id=<?= $_GET['id'] ?>&color=1" title="" style="background: #655643;color: #fff;padding: 6px 14px;border-radius: 15px;">Màu</a>
        <a href="index1.php?id=<?= $_GET['id'] ?>&color=2" title="" style="background: #069974;color: #fff;padding: 6px 14px;border-radius: 15px;">Màu</a>
        <a href="index1.php?id=<?= $_GET['id'] ?>&color=3" title="" style="background: #286898;color: #fff;padding: 6px 14px;border-radius: 15px;">Màu</a>
    </div>
<br/>
<div style="text-align: center;">
    <input id="btn-Preview-Image" type="button" value="Preview"/>
    <a id="btn-Convert-Html2Image" href="#" style="display: ;">Download</a>
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
                // document.getElementById("btn-Convert-Html2Image").style.display = "inline";
                // document.getElementById("btn-Preview-Image").style.display = "none";
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