<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin=new cmsPlugin();
$table="other_page_info";
?>
<?php
if (isset($_POST['create'])) {
    extract($_POST);
    if (!empty($page_name) && !empty($page_moto) && !empty($heading) && !empty($_FILES['photo']['name']) && !empty($_FILES['page_photo']['name']) && !empty($photo_position) && !empty($page_content)) {
        include('class/uploadImage_Class.php');
        $imgclassget=new image_class();
        $photo=$imgclassget->upload_fiximage("upload", "photo", "photo_upload_" . $table_name . "_" . time());
        $page_photo=$imgclassget->upload_fiximage("upload", "page_photo", "page_photo_upload_" . $table_name . "_" . time());
        $insert=array('page_name'=>$page_name, 'page_photo'=>$page_photo, 'page_moto'=>$page_moto, 'heading'=>$heading, 'photo'=>$photo, 'photo_position'=>$photo_position, 'page_content'=>$page_content, 'date'=>date('Y-m-d'), 'status'=>1);
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
    if (!empty($page_name) && !empty($page_moto) && !empty($heading) && !empty($photo_position) && !empty($page_content)) {
        $updatearray=array("id"=>$id);
        if (!empty($_FILES['photo']['name'])) {
            include('class/uploadImage_Class.php');
            $imgclassget=new image_class();
            $photo_1=$imgclassget->upload_fiximage("upload", "photo", "photo_upload_" . $table_name . "_" . time());
            if (!empty($_FILES['page_photo']['name'])) {
                $page_photo=$imgclassget->upload_fiximage("upload", "page_photo", "page_photo_upload_" . $table_name . "_" . time());
            }else {
                $page_photo=$ex_photo2;
            }
            $photo=$photo_1;
            @unlink("upload/" . $ex_photo);
            @unlink("upload/" . $ex_photo2);
        }else {
            $photo=$ex_photo;
            $page_photo=$ex_photo2;
        }

        $upd2=array('page_name'=>$page_name, 'page_photo'=>$page_photo, 'page_moto'=>$page_moto, 'heading'=>$heading, 'photo'=>$photo, 'photo_position'=>$photo_position, 'page_content'=>$page_content, 'date'=>date('Y-m-d'), 'status'=>1);
        $update_merge_array=array_merge($updatearray, $upd2);
        if ($obj->update($table, $update_merge_array) == 1) {
            $plugin->Success("Successfully Updated", $obj->filename());
        }else {
            $plugin->Error("Failed", $obj->filename());
        }
    }
}elseif (isset($_GET['del']) == "delete") {
    $delarray=array("id"=>$_GET['id']);
    $photolink=$obj->SelectAllByVal($table, 'id', $_GET['id'], 'photo');
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
        echo $plugin->KendoCss();
        echo $plugin->FileUploadCss();
        ?>
    </head>
    <body class="">
        <?php
        include('include/topnav.php');
        include('include/mainnav.php');
        ?>





        <div id="content">
            <h1 class="content-heading bg-white border-bottom">Other Page Info</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Other Page Info</a></li>
                    <li><a href="other_page_info_data.php">Other Page Info List</a></li>
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
                            <h4 class="heading">Update/Change - Other Page Info</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
                                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Page Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='page_name' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "page_name"); ?>' placeholder='Page Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Page Moto </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='page_moto' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "page_moto"); ?>' placeholder='Page Moto' class='form-control' />
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Page Photo </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        $page_photo=$obj->SelectAllByVal($table, "id", $_GET['edit'], "page_photo");
                                        echo $plugin->FileUploadBox2("1", $page_photo, "page_photo");
                                        ?>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Heading </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='heading' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "heading"); ?>' placeholder='Heading' class='form-control' />
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Photo </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        $image_name=$obj->SelectAllByVal($table, "id", $_GET['edit'], "photo");
                                        echo $plugin->FileUploadBox("1", $image_name, "photo");
                                        ?>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Photo Position </label>

                                    <div class='col-sm-6'>
                                        <?php
                                        $photo_position=$obj->SelectAllByVal($table, "id", $_GET['edit'], "photo_position");
                                        ?>
                                        <select name='photo_position'>
                                            <option <?php if ($photo_position == "") { ?> selected="selected" <?php } ?> value="">Select A Position</option>
                                            <option <?php if ($photo_position == 1) { ?> selected="selected" <?php } ?>  value="1">Left</option>
                                            <option <?php if ($photo_position == 2) { ?> selected="selected" <?php } ?>  value="2">Right</option>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Page Content </label>

                                    <div class='col-sm-9'>
                                        <textarea id='page_content' name='page_content' placeholder='Page Content' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "page_content"); ?></textarea>
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
                            <h4 class="heading">Create New Other Page Info</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Page Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='page_name' placeholder='Page Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Page Moto </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='page_moto' placeholder='Page Moto' class='form-control' />
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label">Page Photo </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "page_photo");
                                        ?>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Heading </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='heading' placeholder='Heading' class='form-control' />
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Photo </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "photo");
                                        ?>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Photo Position </label>

                                    <div class='col-sm-6'>
                                        <select name='photo_position'>
                                            <option value="">Select A Position</option>
                                            <option value="1">Left</option>
                                            <option value="2">Right</option>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Page Content </label>

                                    <div class='col-sm-9'>
                                        <textarea id='page_content' name='page_content' placeholder='Page Content' class='form-control'></textarea>
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
    echo $plugin->KendoJS();
    echo $plugin->FileUploadJS();
    ?>
    <script>
        $(document).ready(function () {
            $("#page_content").kendoEditor({
                tools: [
                    "bold", "italic", "underline", "strikethrough", "justifyLeft", "justifyCenter", "justifyRight", "justifyFull",
                    "insertUnorderedList", "insertOrderedList", "indent", "outdent", "createLink", "unlink",
                    "insertFile", "subscript", "superscript", "createTable", "addRowAbove", "addRowBelow", "addColumnLeft",
                    "addColumnRight", "deleteRow", "deleteColumn", "viewHtml", "formatting", "cleanFormatting",
                    "fontName", "fontSize", "foreColor", "backColor"
                ]
            });
        });
    </script>
</body>
</html>