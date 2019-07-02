<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin=new cmsPlugin();
$table="contact_location";
?>
<?php
if (isset($_POST['create'])) {
    extract($_POST);
    if (!empty($name) && !empty($map) && !empty($detail) && !empty($hours) && !empty($telephone) && !empty($address) && !empty($email) && !empty($_FILES['adds']['name'])) {
        include('class/uploadImage_Class.php');
        $imgclassget=new image_class();
        $adds=$imgclassget->upload_fiximage("upload", "adds", "adds_upload_" . $table_name . "_" . time());
        $insert=array('name'=>$name, 'map'=>$map, 'detail'=>$detail, 'hours'=>$hours, 'telephone'=>$telephone, 'address'=>$address, 'email'=>$email, 'adds'=>$adds, 'date'=>date('Y-m-d'), 'status'=>1);
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
    if (!empty($name) && !empty($map) && !empty($detail) && !empty($hours) && !empty($telephone) && !empty($address) && !empty($email)) {
        $updatearray=array("id"=>$id);
        if (!empty($_FILES['adds']['name'])) {
            include('class/uploadImage_Class.php');
            $imgclassget=new image_class();
            $adds_1=$imgclassget->upload_fiximage("upload", "adds", "adds_upload_" . $table_name . "_" . time());
            $adds=$adds_1;
            @unlink("upload/" . $ex_adds);
        }else {
            $adds=$ex_adds;
        }$upd2=array('name'=>$name, 'map'=>$map, 'detail'=>$detail, 'hours'=>$hours, 'telephone'=>$telephone, 'address'=>$address, 'email'=>$email, 'adds'=>$adds, 'date'=>date('Y-m-d'), 'status'=>1);
        $update_merge_array=array_merge($updatearray, $upd2);
        if ($obj->update($table, $update_merge_array) == 1) {
            $plugin->Success("Successfully Updated", $obj->filename());
        }else {
            $plugin->Error("Failed", $obj->filename());
        }
    }
}elseif (isset($_GET['del']) == "delete") {
    $delarray=array("id"=>$_GET['id']);
    $photolink=$obj->SelectAllByVal($table, 'id', $_GET['id'], 'adds');
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
            <h1 class="content-heading bg-white border-bottom">Contact Location</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Contact Location</a></li>
                    <li><a href="contact_location_data.php">Contact Location List</a></li>
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
                            <h4 class="heading">Update/Change - Contact Location</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
                                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='name' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "name"); ?>' placeholder='Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Map </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='map' placeholder='Map' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "map"); ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Detail </label>

                                    <div class='col-sm-9'>
                                        <textarea id='detail' name='detail' placeholder='Detail' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "detail"); ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Hours </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='hours' placeholder='Hours' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "hours"); ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Telephone </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='telephone' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "telephone"); ?>' placeholder='Telephone' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Address </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='address' placeholder='Address' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "address"); ?></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Email </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='email' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "email"); ?>' placeholder='Email' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Adds </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        $image_name=$obj->SelectAllByVal($table, "id", $_GET['edit'], "adds");
                                        echo $plugin->FileUploadBox("1", $image_name, "adds");
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
                            <h4 class="heading">Create New Contact Location</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='name' placeholder='Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Map </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='map' placeholder='Map' class='form-control'></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Detail </label>

                                    <div class='col-sm-9'>
                                        <textarea id='detail' name='detail' placeholder='Detail' class='form-control'></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Hours </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='hours' placeholder='Hours' class='form-control'></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Telephone </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='telephone' placeholder='Telephone' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Address </label>

                                    <div class='col-sm-9'>
                                        <textarea id='form-field-1' name='address' placeholder='Address' class='form-control'></textarea>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Email </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='email' placeholder='Email' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Adds </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "adds");
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