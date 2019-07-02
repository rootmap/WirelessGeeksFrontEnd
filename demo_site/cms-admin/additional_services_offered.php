<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin=new cmsPlugin();
$table="additional_services_offered";
?>
<?php
if (isset($_POST['create'])) {
    extract($_POST);
    if (!empty($title) && !empty($short_description) && !empty($large_description) && !empty($_FILES['photo']['name']) && !empty($_FILES['thumble_photo']['name'])) {
        include('class/uploadImage_Class.php');
        $imgclassget=new image_class();
        $photo=$imgclassget->upload_fiximage("upload", "photo", "photo_upload_" . $table_name . "_" . time());
        $thumble_photo=$imgclassget->upload_fiximage("upload", "thumble_photo", "thumble_photo_upload_" . $table_name . "_" . time());
        $insert=array('title'=>$title, 'thumble_photo'=>$thumble_photo, 'short_description'=>$short_description, 'large_description'=>$large_description, 'photo'=>$photo, 'date'=>date('Y-m-d'), 'status'=>1);
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
    if (!empty($title) && !empty($short_description) && !empty($large_description)) {
        $updatearray=array("id"=>$id);

        include('class/uploadImage_Class.php');
        $imgclassget=new image_class();
        if (!empty($_FILES['photo']['name'])) {
            $photo_1=$imgclassget->upload_fiximage("upload", "photo", "photo_upload_" . $table_name . "_" . time());
            $photo=$photo_1;
            @unlink("upload/" . $ex_photo);
        }else {
            $photo=$ex_photo;
        }

        if (!empty($_FILES['thumble_photo']['name'])) {
            $thumble_photo=$imgclassget->upload_fiximage("upload", "thumble_photo", "thumble_photo_upload_" . $table_name . "_" . time());
            @unlink("upload/" . $ex_photo2);
        }else {
            $thumble_photo=$ex_photo2;
        }

        $upd2=array('title'=>$title, 'thumble_photo'=>$thumble_photo, 'short_description'=>$short_description, 'large_description'=>$large_description, 'photo'=>$photo, 'date'=>date('Y-m-d'), 'status'=>1);
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
            <h1 class="content-heading bg-white border-bottom">Additional Services offered</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Additional Services offered</a></li>
                    <li><a href="additional_services_offered_data.php">Additional Services offered List</a></li>
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
                            <h4 class="heading">Update/Change - Additional Services offered</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
                                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Title </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='title' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "title"); ?>' placeholder='Title' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Thumble Photo </label>

                                    <div class='col-sm-9'>
                                        <?php
                                        $thumble_photo=$obj->SelectAllByVal($table, "id", $_GET['edit'], "thumble_photo");
                                        echo $plugin->FileUploadBox2("1", $thumble_photo, "thumble_photo");
                                        ?>

                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Short Description </label>

                                    <div class='col-sm-9'>
                                        <textarea id='short_description' name='short_description' placeholder='Short Description' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "short_description"); ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Large Description </label>

                                    <div class='col-sm-9'>
                                        <textarea id='large_description' name='large_description' placeholder='Large Description' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "large_description"); ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Detail Page Photo </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        $image_name=$obj->SelectAllByVal($table, "id", $_GET['edit'], "photo");
                                        echo $plugin->FileUploadBox("1", $image_name, "photo");
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
                            <h4 class="heading">Create New Additional Services offered</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Title </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='title' placeholder='Title' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Thumble Photo </label>

                                    <div class='col-sm-9'>
                                        <?php
                                        echo $plugin->FileUploadBox2("1", "", "thumble_photo");
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Short Description </label>

                                    <div class='col-sm-9'>
                                        <textarea id='short_description' name='short_description' placeholder='Short Description' class='form-control'></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Large Description </label>

                                    <div class='col-sm-9'>
                                        <textarea id='large_description' name='large_description' placeholder='Large Description' class='form-control'></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Detail Page Photo </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        echo $plugin->FileUploadBox("1", "", "photo");
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
    echo $plugin->KendoJS();
    echo $plugin->FileUploadJS();
    ?>
    <script>
        $(document).ready(function () {
            $("#short_description").kendoEditor({
                tools: [
                    "bold", "italic", "underline", "strikethrough", "justifyLeft", "justifyCenter", "justifyRight", "justifyFull",
                    "insertUnorderedList", "insertOrderedList", "indent", "outdent", "createLink", "unlink",
                    "insertFile", "subscript", "superscript", "createTable", "addRowAbove", "addRowBelow", "addColumnLeft",
                    "addColumnRight", "deleteRow", "deleteColumn", "viewHtml", "formatting", "cleanFormatting",
                    "fontName", "fontSize", "foreColor", "backColor"
                ]
            });

            $("#large_description").kendoEditor({
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