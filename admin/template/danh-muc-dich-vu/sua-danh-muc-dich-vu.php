

<?php

    $servicecat_id = isset($_GET['id']) ? $_GET['id'] : '';

    $row = $action->getDetail_New('servicecat', array('servicecat_id'), array(&$servicecat_id), 'i');

    if ($row == '') {

        header('location: index.php?page=danh-muc-dich-vu');

    }

    $list = $action->getList('servicecat','','','servicecat_id','desc','','','');

    $languages = $action->getListLanguages();



    $action_showMain = new action_page('VN');

    $lang_showMain = "vn";

    $row_showMain = $action_showMain->getDetail_New('servicecat_languages',array('servicecat_id','languages_code'),array(&$row['servicecat_id'], &$lang_showMain),'is');

?>



<form action="" id="updateLangServiceCat">

    <input type="hidden" name="action" value="updateLangServiceCat">

    <input type="hidden" name="servicecat_id" value="<?= $row['servicecat_id']?>">

    <div class="modal fade" id="modal-id">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Chỉnh sửa ngôn ngữ</h4>

                </div>

                <div class="modal-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->

                        <ul class="nav nav-tabs" role="tablist">

                            <?php 

                                foreach ($languages as $key => $lang) {

                                ?>

                                    <li role="presentation" class="<?= $key == 0 ? 'active' : ''?>">

                                        <a href="#<?= $lang['languages_code']?>" aria-controls="home" role="tab" data-toggle="tab"><?= $lang['languages_name']?></a>

                                    </li>

                                <?php

                                }

                            ?>

                        </ul>

                    

                        <!-- Tab panes -->

                        <div class="tab-content">

                            <?php 

                                foreach ($languages as $key => $lang) {

                                    $action1 = new action_page();

                                    $rowDetailLang = $action1->getDetail_New('servicecat_languages',array('servicecat_id','languages_code'),array(&$row['servicecat_id'], &$lang['languages_code']),'is');

                                    

                                ?>

                                    <div role="tabpanel" class="tab-pane <?= $key == 0 ? 'active' : ''?>" id="<?= $lang['languages_code']?>">

                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_servicecat_content]" value="1">

                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_servicecat_sub_info1]" value="">

                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_servicecat_sub_info2]" value="">

                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_servicecat_sub_info3]" value="">

                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_servicecat_sub_info4]" value="">

                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_servicecat_sub_info5]" value="">

                                        <p class="titleRightNCP">Tiêu đề</p>

                                        <input type="text" class="txtNCP1" value="<?= $rowDetailLang['lang_servicecat_name'];?>" name="lang[<?= $lang['languages_code']?>][lang_servicecat_name]"/>

                                        <p class="titleRightNCP">Mô tả ngắn</p> 

                                        <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1<?= $lang['languages_code']?>" name="lang[<?= $lang['languages_code']?>][lang_servicecat_des]" ><?= $rowDetailLang['lang_servicecat_des'];?></textarea></p>

                                    </div>

                                <?php

                                }

                            ?>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </div>

            </div>

        </div>

    </div>

</form>



<form action="" method="post" accept-charset="utf-8" id="updateServiceCat">

    <button class="btnAddTop" type="submit" style="position: fixed;top: 0;right: 220px;z-index: 9;<?php echo ($_SESSION['admin_role']==2)?'display: none;':'';?>">Lưu</button>

    <a class="btnAddTop" data-toggle="modal" href='#modal-id' style="position: fixed;top: 0;right: 285px;z-index: 9;<?php echo ($hidden_multi_lang=='hidden')?'display: none;':'';?>">Chỉnh sửa ngôn ngữ</a>

    <input type="hidden" name="servicecat_id" value="<?php echo $servicecat_id;?>"/>

    <input type="hidden" name="action" value="updateServiceCat">

    <div class="rowNodeContentPage">

        <div class="leftNCP">

            <span class="titLeftNCP">Nội dung trang</span>

            <p class="subLeftNCP">Nhập tiêu đề và nội dung cho trang</p>      

            <p class="titleRightNCP">Chọn ảnh</p>

            <div id="wrapper">

                <input id="fileUpload" type="file" name="fileUpload1"/>

                <br />

                <div id="image-holder">

                    <?php 

                        if ($row['servicecat_img'] != '') {

                        ?>

                            <img src="../images/<?= $row['servicecat_img']?>" class="img-responsive" alt="Image">

                            <input type="hidden" name="servicecat_img" value="<?= $row['servicecat_img']?>">

                        <?php

                        }

                    ?>

                </div>

            </div> 

        </div>

        <div class="boxNodeContentPage">

            <p class="titleRightNCP">Tiêu đề</p>

            <input type="text" class="txtNCP1" id="title" onchange="ChangeToSlug()" value="<?= $row_showMain['lang_servicecat_name'];?>" name="servicecat_name" required />

            <p class="titleRightNCP">Mô tả</p>

            <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1" name="servicecat_des" ><?= $row_showMain['lang_servicecat_des'];?></textarea></p>

            <div class="subColContent">

                <p class="titleRightNCP">Danh mục cha</p>

                <select class="sltBV" name="servicecat_parent" size="10">

                    <option value="0" <?= $row['servicecat_parent'] == 0 ? 'selected' : ''?>>Cấp cha</option>

                    <?php $action->showCategoriesSelect($list, 'servicecat_parent', 0, $row['servicecat_parent'], 'servicecat_id', 'servicecat_name', 0); ?>

                </select>

            </div>

           

        </div>

    </div><!--end rowNodeContentPage-->

    <div class="rowNodeContentPage">

        <div class="leftNCP">

            <span class="titLeftNCP">Tối ưu SEO</span>

            <p class="subLeftNCP">Thiết lập thẻ tiêu đề, thẻ mô tả, đường dẫn. Những thông tin này xác định cách danh mục xuất hiện trên công cụ tìm kiếm.</p>                

        </div>

        <div class="boxNodeContentPage">

            <div>

                <p class="titleRightNCP">Tiêu đề trang</p>

                <p class="subRightNCP">Số ký tự đã dùng: <strong class="text-character">0</strong>/70</p>

                <input type="text" class="txtNCP1" value="<?php echo $row_showMain['title_seo'];?>" id="title_seo" name="title_seo" onkeyup="countChar(this)"/>

            </div>

            <p class="titleRightNCP">Thẻ mô tả</p>

            <p class="subRightNCP">Số ký tự đã dùng: <strong class="text-character">0</strong>/160</p>

            <textarea class="longtxtNCP2" name="des_seo"  onkeyup="countChar(this)"><?php echo $row_showMain['des_seo'];?></textarea>

            <p class="titleRightNCP">Keyword</p>

            <input type="text" class="txtNCP1"  name="keyword" value="<?php echo $row_showMain['keyword']?>"/>

            <p class="titleRightNCP">Đường dẫn</p>

            <div class="coverLinkNCP">

                <div  id="slug">

                    <input type="text" id="slug1" class="txtLinkNCP" name="friendly_url" value="<?php echo $row_showMain['friendly_url']?>"/> 

                </div>    

            </div>

        </div>

    </div><!--end rowNodeContentPage-->

   

    <div class="rowNodeContentPage">

        <div class="leftNCP">

            <span class="titLeftNCP">Trạng thái</span>

        </div>

        <div class="boxNodeContentPage">

            <div>

                <label class="selectCate">

                    <input type="checkbox" value="1" name="state" <?= $row['state'] == 1 ? 'checked' : '' ?>>Trạng thái hiển thị

                </label>

            </div>

            

        </div>

    </div><!--end rowNodeContentPage-->

    

    <button type="submit" class="btn btnSave" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?>>Lưu</button>

    <button type="button" class="btn btnDelete" id="deleteServiceCat" data-id="<?= $servicecat_id?>" data-action="deleteServiceCat" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?>>Xóa</button>

</form>





