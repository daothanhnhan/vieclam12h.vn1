<?php 
      $footer_tinh = $action->getList('location', '', '', 'id', 'asc', '', '', '');
      $search_name = array();
    foreach ($footer_tinh as $key => $row)
    {
        $search_name[$key] = $row['name'];
    }
    // array_multisort($search_name, SORT_ASC, $footer_tinh);
?>
<style>
.cv-overlay-1 {
  position: relative;
  /*width: 50%;*/
}

.image-1 {
  display: block;
  width: 100%;
  height: auto;
}

.overlay-1 {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #000;
}

.cv-overlay-1:hover .overlay-1 {
  opacity: 0.7;
}

.text-1 {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
  width: 100%;
}
</style>
<div class="gb-search-tinhthanh-vieclam hidden-sm hidden-xs" style="padding-left: 0;">
    <div class="container">
        <!-- <h2>TÌM VIỆC LÀM THEO TỈNH THÀNH</h2> -->
        <h2 style="background: #2f5177;color: #ffffff;font-size: 20px;padding: 8px;text-align: center;">TẢI MẪU MẪU CV</h2>
        <hr>
        <ul class="row" style="display: none;">
            <?php foreach ($footer_tinh as $item) { ?>
            <li class="col-sm-3"><a href="/index.php?page=tim-kiem&title=&location=<?= $item['id'] ?>"><?= $item['name'] ?></a></li>
            <?php } ?>
        </ul>
        <ul class="row">
            <li class="col-sm-3 cv-overlay-1">
                <img src="/images/cv1/cv11.PNG" alt="" style="width: 100%;" onclick="alert('Bạn vui lòng đăng ký tài khoản để tải mẫu CV');" class="image-1">
                <div class="overlay-1">
                    <?php if (isset($_SESSION['user_id_gbvn']) && $_SESSION['user_type_gbvn']==2) { ?>
                    <div class="text-1"><a href="/cv1/index.php?id=<?= $_SESSION['user_id_gbvn'] ?>" target="_blank" style="color: #fff;font-size: 20px;">Sử dụng mẫu CV này</a></div>
                    <?php } else { ?>
                    <div class="text-1">Bạn vui lòng đăng ký hoặc đăng nhập để tải mẫu CV</div>
                    <?php } ?>
                </div>
            </li>
            <li class="col-sm-3 cv-overlay-1">
                <img src="/images/cv1/cv12.PNG" alt="" style="width: 100%;" onclick="alert('Bạn vui lòng đăng ký tài khoản để tải mẫu CV');">
                <div class="overlay-1">
                    <?php if (isset($_SESSION['user_id_gbvn']) && $_SESSION['user_type_gbvn']==2) { ?>
                    <div class="text-1"><a href="/cv1/index1.php?id=<?= $_SESSION['user_id_gbvn'] ?>" target="_blank" style="color: #fff;font-size: 20px;">Sử dụng mẫu CV này</a></div>
                    <?php } else { ?>
                    <div class="text-1">Bạn vui lòng đăng ký hoặc đăng nhập để tải mẫu CV</div>
                    <?php } ?>
                </div>
            </li>
            
            <li class="col-sm-3 cv-overlay-1">
                <img src="/images/cv1/cv13.PNG" alt="" style="width: 100%;" onclick="alert('Bạn vui lòng đăng ký tài khoản để tải mẫu CV');">
                <div class="overlay-1">
                    <?php if (isset($_SESSION['user_id_gbvn']) && $_SESSION['user_type_gbvn']==2) { ?>
                    <div class="text-1"><a href="/cv1/index3.php?id=<?= $_SESSION['user_id_gbvn'] ?>" target="_blank" style="color: #fff;font-size: 20px;">Sử dụng mẫu CV này</a></div>
                    <?php } else { ?>
                    <div class="text-1">Bạn vui lòng đăng ký hoặc đăng nhập để tải mẫu CV</div>
                    <?php } ?>
                </div>
            </li>
            <li class="col-sm-3 cv-overlay-1">
                <img src="/images/cv1/cv14.PNG" alt="" style="width: 100%;" onclick="alert('Bạn vui lòng đăng ký tài khoản để tải mẫu CV');">
                <div class="overlay-1">
                    <?php if (isset($_SESSION['user_id_gbvn']) && $_SESSION['user_type_gbvn']==2) { ?>
                    <div class="text-1"><a href="/cv1/index4.php?id=<?= $_SESSION['user_id_gbvn'] ?>" target="_blank" style="color: #fff;font-size: 20px;">Sử dụng mẫu CV này</a></div>
                    <?php } else { ?>
                    <div class="text-1">Bạn vui lòng đăng ký hoặc đăng nhập để tải mẫu CV</div>
                    <?php } ?>
                </div>
            </li>
        </ul>
        <ul class="row">
            <li class="col-sm-3 cv-overlay-1">
                <img src="/images/cv1/cv15.PNG" alt="" style="width: 100%;" onclick="alert('Bạn vui lòng đăng ký tài khoản để tải mẫu CV');" class="image-1">
                <div class="overlay-1">
                    <?php if (isset($_SESSION['user_id_gbvn']) && $_SESSION['user_type_gbvn']==2) { ?>
                    <div class="text-1"><a href="/cv1/index5.php?id=<?= $_SESSION['user_id_gbvn'] ?>" target="_blank" style="color: #fff;font-size: 20px;">Sử dụng mẫu CV này</a></div>
                    <?php } else { ?>
                    <div class="text-1">Bạn vui lòng đăng ký hoặc đăng nhập để tải mẫu CV</div>
                    <?php } ?>
                </div>
            </li>
            <li class="col-sm-3 cv-overlay-1">
                <img src="/images/cv1/cv16.PNG" alt="" style="width: 100%;" onclick="alert('Bạn vui lòng đăng ký tài khoản để tải mẫu CV');">
                <div class="overlay-1">
                    <?php if (isset($_SESSION['user_id_gbvn']) && $_SESSION['user_type_gbvn']==2) { ?>
                    <div class="text-1"><a href="/cv1/index6.php?id=<?= $_SESSION['user_id_gbvn'] ?>" target="_blank" style="color: #fff;font-size: 20px;">Sử dụng mẫu CV này</a></div>
                    <?php } else { ?>
                    <div class="text-1">Bạn vui lòng đăng ký hoặc đăng nhập để tải mẫu CV</div>
                    <?php } ?>
                </div>
            </li>
            
            <li class="col-sm-3 cv-overlay-1">
                <img src="/images/cv1/cv17.PNG" alt="" style="width: 100%;" onclick="alert('Bạn vui lòng đăng ký tài khoản để tải mẫu CV');">
                <div class="overlay-1">
                    <?php if (isset($_SESSION['user_id_gbvn']) && $_SESSION['user_type_gbvn']==2) { ?>
                    <div class="text-1"><a href="/cv1/index7.php?id=<?= $_SESSION['user_id_gbvn'] ?>" target="_blank" style="color: #fff;font-size: 20px;">Sử dụng mẫu CV này</a></div>
                    <?php } else { ?>
                    <div class="text-1">Bạn vui lòng đăng ký hoặc đăng nhập để tải mẫu CV</div>
                    <?php } ?>
                </div>
            </li>
            <li class="col-sm-3 cv-overlay-1">
                <img src="/images/cv1/cv18.PNG" alt="" style="width: 100%;" onclick="alert('Bạn vui lòng đăng ký tài khoản để tải mẫu CV');">
                <div class="overlay-1">
                    <?php if (isset($_SESSION['user_id_gbvn']) && $_SESSION['user_type_gbvn']==2) { ?>
                    <div class="text-1"><a href="/cv1/index8.php?id=<?= $_SESSION['user_id_gbvn'] ?>" target="_blank" style="color: #fff;font-size: 20px;">Sử dụng mẫu CV này</a></div>
                    <?php } else { ?>
                    <div class="text-1">Bạn vui lòng đăng ký hoặc đăng nhập để tải mẫu CV</div>
                    <?php } ?>
                </div>
            </li>
        </ul>
    </div>
</div>