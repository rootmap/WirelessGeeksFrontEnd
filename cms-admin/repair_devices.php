<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin=new cmsPlugin();
$table="repair_devices";
?>
<?php
if (isset($_POST['create'])) {
    extract($_POST);
    if (!empty($name)) {
        if (!empty($_FILES['device_photo']['name'])) {
            include('class/uploadImage_Class.php');
            $imgclassget=new image_class();
            $device_photo=$imgclassget->upload_fiximage("upload", "device_photo", "device_photo_upload_" . $table_name . "_" . time());
        }else {
            $device_photo='';
        }
        $insert=array('name'=>$name, 'repair_page_heading'=>$repair_page_heading, 'repair_page_sub_heading'=>$repair_page_sub_heading, 'device_photo'=>$device_photo, 'photo_position'=>$photo_position, 'device_detail'=>$device_detail, 'priority'=>$priority, 'date'=>date('Y-m-d'), 'status'=>1);
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
    if (!empty($name)) {
        $updatearray=array("id"=>$id);
        if (!empty($_FILES['device_photo']['name'])) {
            include('class/uploadImage_Class.php');
            $imgclassget=new image_class();
            $device_photo_1=$imgclassget->upload_fiximage("upload", "device_photo", "device_photo_upload_" . $table_name . "_" . time());
            $device_photo=$device_photo_1;
            @unlink("upload/" . $ex_device_photo);
        }else {
            $device_photo=$ex_device_photo;
        }$upd2=array('name'=>$name, 'repair_page_heading'=>$repair_page_heading, 'repair_page_sub_heading'=>$repair_page_sub_heading, 'device_photo'=>$device_photo, 'photo_position'=>$photo_position, 'device_detail'=>$device_detail, 'priority'=>$priority, 'date'=>date('Y-m-d'), 'status'=>1);
        $update_merge_array=array_merge($updatearray, $upd2);
        if ($obj->update($table, $update_merge_array) == 1) {
            $plugin->Success("Successfully Updated", $obj->filename());
        }else {
            $plugin->Error("Failed", $obj->filename());
        }
    }
}elseif (isset($_GET['del']) == "delete") {
    $delarray=array("id"=>$_GET['id']);
    $photolink=$obj->SelectAllByVal($table, 'id', $_GET['id'], 'device_photo');
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
            <h1 class="content-heading bg-white border-bottom">Repair Devices</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Repair Devices</a></li>
                    <li><a href="repair_devices_data.php">Repair Devices List</a></li>
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
                            <h4 class="heading">Update/Change - Repair Devices</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
                                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='name' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "name"); ?>' placeholder='Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Repair Page Heading </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='repair_page_heading' placeholder='Repair Page Heading' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "repair_page_heading"); ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Repair Page Sub Heading </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='repair_page_sub_heading' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "repair_page_sub_heading"); ?>' placeholder='Repair Page Sub Heading' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Device Photo </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        $image_name=$obj->SelectAllByVal($table, "id", $_GET['edit'], "device_photo");
                                        echo $plugin->FileUploadBox("1", $image_name, "device_photo");
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Photo Position </label>

                                    <div class='col-sm-6'>
                                        <?php
                                        $photo_position=$obj->SelectAllByVal($table, "id", $_GET['edit'], "photo_position");
                                        ?>
                                        <select name="photo_position">
                                            <option <?php if ($photo_position == 1) { ?> selected="selected" <?php } ?> value="1">Left</option>
                                            <option <?php if ($photo_position == 2) { ?> selected="selected" <?php } ?> value="2">Right</option>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Device Detail </label>

                                    <div class='col-sm-9'>
                                        <textarea id='detail' name='device_detail' placeholder='Device Detail' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "device_detail"); ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Priority </label>

                                    <div class='col-sm-6'>
                                        <input type='text' id='form-field-1' name='priority' placeholder='Priority'  value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "priority"); ?>'  class='form-control' />
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
                            <h4 class="heading">Create New Repair Devices</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='name' placeholder='Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Repair Page Heading </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='repair_page_heading' placeholder='Repair Page Heading' class='form-control'></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Repair Page Sub Heading </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='repair_page_sub_heading' placeholder='Repair Page Sub Heading' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Device Photo </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "device_photo");
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Photo Position </label>

                                    <div class='col-sm-6'>
                                        <select name="photo_position">
                                            <option value="1">Left</option>
                                            <option value="2">Right</option>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Device Detail </label>

                                    <div class='col-sm-9'>
                                        <textarea id='detail' name='device_detail' placeholder='Device Detail' class='form-control'></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Priority </label>

                                    <div class='col-sm-6'>
                                        <input type='text' id='form-field-1' name='priority' placeholder='Priority' class='form-control' />
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
            $("#detail").kendoEditor({
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