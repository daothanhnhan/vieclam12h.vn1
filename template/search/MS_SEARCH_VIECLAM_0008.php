<style>
@media screen and (min-width: 991px) {
	.tim-kiem-mobile {
		display: none;
	}
}
@media screen and (min-width: 370px) {
    .margin-left-log {
        margin-left: 5%;
    }
}
@media screen and (min-width: 400px) {
    .margin-left-log {
        margin-left: 9%;
    }
}
</style>
<div class="container tim-kiem-mobile">

<div class="row" style="margin-bottom: 10px;">
    <!-- <div class="col-xs-5" style="width: 37%;">
        
    </div>
    <div class="col-xs-4">
        
    </div>
    <div class="col-xs-3" style="width: 29%;">
        
    </div> -->
    <div class="col-md-12">
        <button style="background: #19a05e;color: #fff;border:0;border-radius: 13px;font-size: 16px;" data-toggle="collapse" data-target="#demo-mb">Lọc ứng viên</button>
        <a href="/dang-nhap" title="" class="margin-left-log" style="background: #0091cf;color: #fff;border-radius: 10px;padding: 4px 6px;font-weight: bold;">Đăng nhập</a>
        <a href="/dang-ky" title="" class="margin-left-log" style="background: #fc205c;color: #fff;border-radius: 10px;padding: 4px 7px;font-weight: bold;">Đăng ký</a>
    </div>
</div>
<form action="/index.php" id="demo-mb" class="collapse" method="get" accept-charset="utf-8" style="height: 0;">
	<div class="row">
		<div class="col-md-12" style="display: none;">
            <div class="form-group input-icons">
                <input type="hidden" name="page" value="tim-kiem-ung-vien">
                <i class="fa fa-search icon"></i>
                <input type="text" name="title" value="<?= isset($_GET['title']) ? $_GET['title'] : '' ?>" placeholder="Tên ứng viên, vị trí tuyển dụng ...." class="form-control input-field">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group search-diadiemheader input-icons">
                <i class="icon-hammer-wrench icon"></i>
                <select name="career" id="career" onchange="select_career(this)" class="selectpicker1 form-control select-padding-left" data-show-subtext="true" data-live-search="true">
                    <option value="0" data-icon="glyphicon glyphicon-wrench">Tất cả ngành nghề</option>
                    <?php foreach ($search_career as $item) { ?>
                    <option value="<?= $item['id'] ?>" <?php if (isset($_GET['career'])) {if ($_GET['career']==$item['id']) {echo 'selected';}} ?> ><?= $item['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group search-diadiemheader input-icons">
                <i class="icon-map-marker icon"></i>
                <select name="location" id="location" onchange="select_location(this)" class="selectpicker1 form-control select-padding-left" data-show-subtext="true" data-live-search="true">
                    <option value="0" data-icon="glyphicon glyphicon-map-marker">Tất cả địa điểm</option>
                    <option value="72" <?php if (isset($_GET['location'])) {if ($_GET['location']==72) {echo 'selected';}} ?> >Hà Nội</option>
                    <option value="71" <?php if (isset($_GET['location'])) {if ($_GET['location']==71) {echo 'selected';}} ?> >Hồ Chí Minh</option>
                    <?php 
                    foreach ($search_location as $item) { 
                        if ($item['id'] == 71 || $item['id'] == 72) { } else { 
                    ?>
                    <option value="<?= $item['id'] ?>" <?php if (isset($_GET['location'])) {if ($_GET['location']==$item['id']) {echo 'selected';}} ?> ><?= $item['name'] ?></option>
                    <?php } } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group search-diadiemheader input-icons">
                <i class="icon-man-woman icon"></i>
                <select name="sex" id="sex" onchange="select_sex(this)" class="selectpicker1 form-control select-padding-left" data-show-subtext="true" data-live-search="true">
                    <option value="2" data-icon="glyphicon glyphicon-user">Tất cả giới tính</option>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group search-diadiemheader input-icons">
                <i class="glyphicon glyphicon-time icon"></i>
                <select name="experience" id="experience" onchange="select_experience(this)" class="selectpicker1 form-control select-padding-left" data-show-subtext="true" data-live-search="true">
                    <option value="0" data-icon="glyphicon glyphicon-time">Tất cả kinh nghiêm</option>
                    <?php foreach ($search_experience as $item) { ?>
                    <option value="<?= $item['id'] ?>" ><?= $item['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group search-diadiemheader input-icons">
                <i class="icon-graduation-hat icon"></i>
                <select name="level" id="level" onchange="select_level(this)" class="selectpicker1 form-control select-padding-left" data-show-subtext="true" data-live-search="true">
                    <option value="0" data-icon="glyphicon glyphicon-education">Tất cả trình độ</option>
                    <?php foreach ($search_level as $item) { ?>
                    <option value="<?= $item['id'] ?>" ><?= $item['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group search-diadiemheader input-icons">
                <i class="icon-clipboard-user icon"></i>
                <select name="office" id="office" onchange="select_office(this)" class="selectpicker1 form-control select-padding-left" data-show-subtext="true" data-live-search="true">
                    <option value="0" data-icon="glyphicon glyphicon-briefcase">Tất cả vị trí</option>
                    <?php foreach ($search_vi_tri as $item) { ?>
                    <option value="<?= $item['id'] ?>" ><?= $item['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12" style="display: none;">
            <div class="form-group search-diadiemheader input-icons">
                <select name="lang" class="selectpicker1 form-control select-padding-left" data-show-subtext="true" data-live-search="true">
                    <option value="0" data-icon="glyphicon glyphicon-globe">Tất cả ngoại ngữ</option>
                    <?php foreach ($search_ngng as $item) { ?>
                    <option value="<?= $item['id'] ?>" ><?= $item['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12" style="display: none;">
            <div class="form-group search-diadiemheader input-icons">
                <select name="luong" class="selectpicker1 form-control select-padding-left" data-show-subtext="true" data-live-search="true">
                    <option value="0" data-icon="glyphicon glyphicon-usd">Tất cả mức lương</option>
                    <?php foreach ($search_luong as $item) { ?>
                    <option value="<?= $item['id'] ?>" ><?= $item['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <button class="btn btn-timkiem-vieclam" style="background: #1b91d1;color:#fff;border-radius: 13px;">Tìm kiếm</button>
            </div>
        </div>
	</div>
</form>
</div>

<script>
    function select_career (data) {
        // alert(data.value);
        var element = document.getElementById("career");
        var val = data.value;
        if (val == 0) {
            element.classList.remove("select-bold");
        } else {
            element.classList.add("select-bold");
        }
    }

    function select_location (data) {
        // alert(data.value);
        var element = document.getElementById("location");
        var val = data.value;
        if (val == 0) {
            element.classList.remove("select-bold");
        } else {
            element.classList.add("select-bold");
        }
    }

    function select_sex (data) {
        // alert(data.value);
        var element = document.getElementById("sex");
        var val = data.value;
        if (val == 2) {
            element.classList.remove("select-bold");
        } else {
            element.classList.add("select-bold");
        }
    }

    function select_experience (data) {
        // alert(data.value);
        var element = document.getElementById("experience");
        var val = data.value;
        if (val == 0) {
            element.classList.remove("select-bold");
        } else {
            element.classList.add("select-bold");
        }
    }

    function select_level (data) {
        // alert(data.value);
        var element = document.getElementById("level");
        var val = data.value;
        if (val == 0) {
            element.classList.remove("select-bold");
        } else {
            element.classList.add("select-bold");
        }
    }

    function select_office (data) {
        // alert(data.value);
        var element = document.getElementById("office");
        var val = data.value;
        if (val == 0) {
            element.classList.remove("select-bold");
        } else {
            element.classList.add("select-bold");
        }
    }
</script>