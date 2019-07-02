<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin=new cmsPlugin();
$table="seo_setting";
?>
<?php
if (isset($_POST['create'])) {
    extract($_POST);
    if (!empty($site_title) && !empty($site_keywords) && !empty($site_description) && !empty($site_author) && !empty($_FILES['site_favicon']['name'])) {
        include('class/uploadImage_Class.php');
        $imgclassget=new image_class();
        $site_favicon=$imgclassget->fileUpload("site_favicon", "site_favicon_upload_" . $table_name . "_" . time(), "upload");
        $insert=array('site_title'=>$site_title, 'site_keywords'=>$site_keywords, 'site_description'=>$site_description, 'site_author'=>$site_author, 'site_favicon'=>$site_favicon, 'date'=>date('Y-m-d'), 'status'=>1);
        if ($obj->insert($table, $insert) == 1) {
            $plugin->Success("Successfully Saved", $obj->filename());
        }else {
            $plugin->Error("Failed", $obj->filename());
        }
    }else {
        $plugin->Error("Fields is Empty", $obj->filename());
    }
}elseif (isset($_POST['update'])) {
    extract($_POST);
    if (!empty($site_title) && !empty($site_keywords) && !empty($site_description) && !empty($site_author)) {
        $updatearray=array("id"=>$id);
        if (!empty($_FILES['site_favicon']['name'])) {
            include('class/uploadImage_Class.php');
            $imgclassget=new image_class();
            $site_favicon_1=$imgclassget->fileUpload("site_favicon", "site_favicon_upload_" . $table_name . "_" . time(), "upload");
            $site_favicon=$site_favicon_1;
            @unlink("upload/" . $ex_site_favicon);
        }else {
            $site_favicon=$ex_site_favicon;
        }$upd2=array('site_title'=>$site_title, 'site_keywords'=>$site_keywords, 'site_description'=>$site_description, 'site_author'=>$site_author, 'site_favicon'=>$site_favicon, 'date'=>date('Y-m-d'), 'status'=>1);
        $update_merge_array=array_merge($updatearray, $upd2);
        if ($obj->update($table, $update_merge_array) == 1) {
            $plugin->Success("Successfully Updated", $obj->filename());
        }else {
            $plugin->Error("Failed", $obj->filename());
        }
    }
}elseif (isset($_GET['del']) == "delete") {
    $delarray=array("id"=>$_GET['id']);
    $photolink=$obj->SelectAllByVal($table, 'id', $_GET['id'], 'site_favicon');
    @unlink("upload/" . $photolink);
    if ($obj->delete($table, $delarray) == 1) {
        $plugin->Success("Successfully Delete", $obj->filename());
    }else {
        $plugin->Error("Failed", $obj->filename());
    }
}
?><!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head>
        <?php
        echo $plugin->softwareTitle();
        echo $plugin->TableCss();
        echo $plugin->FileUploadCss();
        ?>
    </head>
    <body class="">
        <?php
        include('include/topnav.php');
        include('include/mainnav.php');
        ?>





        <div id="content">
            <h1 class="content-heading bg-white border-bottom">SEO Setting</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New SEO Setting</a></li>
                    <li><a href="seo_setting_data.php">SEO Setting List</a></li>
                </ul>
            </div>
            <div class="innerAll spacing-x2">
                <?php echo $plugin->ShowMsg(); ?>
                <!-- Widget -->

                <!-- Widget -->
                <div class="widget widget-inverse" >
                    <?php
                    if (isset($_GET['edit'])) {
                        ?>
                        <!-- Widget heading -->
                        <div class="widget-head">
                            <h4 class="heading">Update/Change - SEO Setting</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
                                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Site Title </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='site_title' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "site_title"); ?>' placeholder='Site Title' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Site Keywords </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='site_keywords' placeholder='Site Keywords' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "site_keywords"); ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Site Description </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='site_description' placeholder='Site Description' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "site_description"); ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Site Author </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='site_author' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "site_author"); ?>' placeholder='Site Author' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Site Favicon </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        $fav=$obj->SelectAllByVal($table, "id", $_GET['edit'], "site_favicon");
                                        echo $plugin->FileUploadBox("1", $fav, "site_favicon");
                                        ?>
                                    </div>
                                </div><div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button  onclick="javascript:return confirm('Do You Want change/update These Record?')"  type="submit" name="update" class="btn btn-primary">Save Change</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php }else { ?>
                        <!-- Widget heading -->
                        <div class="widget-head">
                            <h4 class="heading">Create New SEO Setting</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Site Title </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='site_title' placeholder='Site Title' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Site Keywords </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='site_keywords' placeholder='Site Keywords' class='form-control'><?php
                                            $sqlkeywords=$obj->FlyQuery("SELECT version.* FROM (SELECT name FROM `repair_device_version`) as version UNION
                                            SELECT problem.* from (SELECT `problem_name` as name FROM `repair_device_problem`)  as problem
                                            UNION
                                            SELECT version1.* FROM (SELECT name FROM `repair_other_device_version`) as version1 UNION
                                            SELECT problem1.* from (SELECT `name` as name FROM `repair_other_device_problem`)  as problem1");
                                            if (!empty($sqlkeywords)) {
                                                $break=1;
                                                foreach ($sqlkeywords as $keyw):
                                                    if ($break != 1) {
                                                        echo ",";
                                                    }
                                                    echo $keyw->name;
                                                    $break++;
                                                endforeach;
                                            }
                                            ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Site Description </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='site_description' placeholder='Site Description' class='form-control'><?php
                                            if (!empty($sqlkeywords)) {
                                                $break=1;
                                                foreach ($sqlkeywords as $keyw):
                                                    if ($break != 1) {
                                                        echo ",";
                                                    }
                                                    echo $keyw->name;
                                                    $break++;
                                                endforeach;
                                            }
                                            ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Site Author </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' value="Md Mahamudur Zaman Bhuyian Fahad - Neutrix.systems" name='site_author' placeholder='Site Author' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Site Favicon </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "site_favicon");
                                        ?>
                                    </div>
                                </div><div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit"   onclick="javascript:return confirm('Do You Want Create/save These Record?')"  name="create" class="btn btn-info">Save</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <!-- // Widget END -->




                <!-- // Widget END -->
            </div>
        </div>
        <!-- // Content END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & content wrapper END -->
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->

    <?php
    echo $plugin->TableJs();
    echo $plugin->FileUploadJS();
    ?>

</body>
</html>