<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin=new cmsPlugin();
$table="repair_other_device_problem";
?>
<?php
if (isset($_POST['create'])) {
    extract($_POST);
    if (!empty($device) && !empty($device_type) && !empty($device_version) && !empty($name) && !empty($repair_fix_price) && !empty($_FILES['problem_photo']['name'])) {
        include('class/uploadImage_Class.php');
        $imgclassget=new image_class();
        $problem_photo=$imgclassget->upload_fiximage("upload", "problem_photo", "problem_photo_upload_" . $table_name . "_" . time());
        $insert=array('device'=>$device, 'device_type'=>$device_type, 'device_version'=>$device_version, 'name'=>$name, 'repair_fix_price'=>$repair_fix_price, 'problem_photo'=>$problem_photo, 'date'=>date('Y-m-d'), 'status'=>1);
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
    if (!empty($device) && !empty($device_type) && !empty($device_version) && !empty($name) && !empty($repair_fix_price)) {
        $updatearray=array("id"=>$id);
        if (!empty($_FILES['problem_photo']['name'])) {
            include('class/uploadImage_Class.php');
            $imgclassget=new image_class();
            $problem_photo_1=$imgclassget->upload_fiximage("upload", "problem_photo", "problem_photo_upload_" . $table_name . "_" . time());
            $problem_photo=$problem_photo_1;
            @unlink("upload/" . $ex_problem_photo);
        }else {
            $problem_photo=$ex_problem_photo;
        }$upd2=array('device'=>$device, 'device_type'=>$device_type, 'device_version'=>$device_version, 'name'=>$name, 'repair_fix_price'=>$repair_fix_price, 'problem_photo'=>$problem_photo, 'date'=>date('Y-m-d'), 'status'=>1);
        $update_merge_array=array_merge($updatearray, $upd2);
        if ($obj->update($table, $update_merge_array) == 1) {
            $plugin->Success("Successfully Updated", $obj->filename());
        }else {
            $plugin->Error("Failed", $obj->filename());
        }
    }
}elseif (isset($_GET['del']) == "delete") {
    $delarray=array("id"=>$_GET['id']);
    $photolink=$obj->SelectAllByVal($table, 'id', $_GET['id'], 'problem_photo');
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
            <h1 class="content-heading bg-white border-bottom">Repair Other Device Problem</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Repair Other Device Problem</a></li>
                    <li><a href="repair_other_device_problem_data.php">Repair Other Device Problem List</a></li>
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
                            <h4 class="heading">Update/Change - Repair Other Device Problem</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
                                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Device </label>

                                    <div class='col-sm-6'>
                                        <?php
                                        $device_ex=$obj->SelectAllByVal($table, "id", $_GET['edit'], "device");
                                        ?>
                                        <select id='device' name='device' class='form-control'>
                                            <option value="">Select Repair Devices</option>
                                            <?php
                                            $sqlrepairdevices=$obj->FlyQuery("SELECT * FROM repair_devices");
                                            if (!empty($sqlrepairdevices)) {
                                                foreach ($sqlrepairdevices as $device):
                                                    ?>
                                                    <option <?php if ($device_ex == $device->id) { ?> selected="selected" <?php } ?> value="<?php echo $device->id; ?>"><?php echo $device->name; ?></option>
                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                        <script>
                                            $(document).ready(function () {
                                                $("#device").change(function () {
                                                    var getdevice = $(this).val();
                                                    if (getdevice != "")
                                                    {
                                                        $.post("./json_data/banner_list.php", {"acst": "4", "ff1": "id", "ff2": "name", "fid": "repair_device", "table": "repair_device_version", "fval": getdevice}, function (datas) {
                                                            //alert(data);
                                                            var df = JSON.stringify(datas);
                                                            var datacl = jQuery.parseJSON(df);
                                                            $("#device_type").html(datacl.stv);
                                                        });
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Device Type </label>

                                    <div class='col-sm-6'>
                                        <?php $device_type=$obj->SelectAllByVal($table, "id", $_GET['edit'], "device_type"); ?>
                                        <select id="device_type" name='device_type' class='form-control'>
                                            <option value="">Select Devices Type</option>
                                            <?php
                                            $sqlrepair_device=$obj->FlyQuery("SELECT id,name,repair_device FROM repair_device_version WHERE repair_device='" . $device_ex . "'");
                                            if (!empty($sqlrepair_device)) {
                                                foreach ($sqlrepair_device as $device):
                                                    ?>
                                                    <option <?php if ($device_type == $device->id) { ?> selected="selected" <?php } ?> value="<?php echo $device->id; ?>"><?php echo $device->name; ?></option>
                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                        <script>
                                            $(document).ready(function () {
                                                $("#device_type").change(function () {
                                                    var getdevice = $(this).val();
                                                    if (getdevice != "")
                                                    {
                                                        $.post("./json_data/banner_list.php", {"acst": "4", "ff1": "id", "ff2": "name", "fid": "device_type", "table": "repair_other_device_version", "fval": getdevice}, function (datas) {
                                                            //alert(data);
                                                            var df = JSON.stringify(datas);
                                                            var datacl = jQuery.parseJSON(df);
                                                            $("#device_version").html(datacl.stv);
                                                        });
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Device Version </label>

                                    <div class='col-sm-6'>
                                        <?php
                                        $device_version=$obj->SelectAllByVal($table, "id", $_GET['edit'], "device_version");
                                        ?>
                                        <select id="device_version" name='device_version' class='form-control'>
                                            <option value="">Select Devices Version</option>
                                            <?php
                                            $sqlrepair_device=$obj->FlyQuery("SELECT id,name,device_type FROM repair_other_device_version WHERE device_type='" . $device_type . "'");
                                            if (!empty($sqlrepair_device)) {
                                                foreach ($sqlrepair_device as $device):
                                                    ?>
                                                    <option <?php if ($device_version == $device->id) { ?> selected="selected" <?php } ?> value="<?php echo $device->id; ?>"><?php echo $device->name; ?></option>
                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='name' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "name"); ?>' placeholder='Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Repair Fix Price </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='repair_fix_price' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "repair_fix_price"); ?>' placeholder='Repair Fix Price' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Problem Photo </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        $image_name=$obj->SelectAllByVal($table, "id", $_GET['edit'], "problem_photo");
                                        echo $plugin->FileUploadBox("1", $image_name, "problem_photo");
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
                            <h4 class="heading">Create New Repair Other Device Problem</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Device </label>

                                    <div class='col-sm-6'>
                                        <select id='device' name='device' class='form-control'>
                                            <option value="">Select Repair Devices</option>
                                            <?php
                                            $sqlrepairdevices=$obj->FlyQuery("SELECT * FROM repair_devices");
                                            if (!empty($sqlrepairdevices)) {
                                                foreach ($sqlrepairdevices as $device):
                                                    ?>
                                                    <option value="<?php echo $device->id; ?>"><?php echo $device->name; ?></option>
                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                        <script>
                                            $(document).ready(function () {
                                                $("#device").change(function () {
                                                    var getdevice = $(this).val();
                                                    if (getdevice != "")
                                                    {
                                                        $.post("./json_data/banner_list.php", {"acst": "4", "ff1": "id", "ff2": "name", "fid": "repair_device", "table": "repair_device_version", "fval": getdevice}, function (datas) {
                                                            //alert(data);
                                                            var df = JSON.stringify(datas);
                                                            var datacl = jQuery.parseJSON(df);
                                                            $("#device_type").html(datacl.stv);
                                                        });
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Device Type </label>

                                    <div class='col-sm-6'>
                                        <select id="device_type" name='device_type' class='form-control'>
                                            <option value="">Select Devices Type</option>
                                        </select>
                                        <script>
                                            $(document).ready(function () {
                                                $("#device_type").change(function () {
                                                    var getdevice = $(this).val();
                                                    if (getdevice != "")
                                                    {
                                                        $.post("./json_data/banner_list.php", {"acst": "4", "ff1": "id", "ff2": "name", "fid": "device_type", "table": "repair_other_device_version", "fval": getdevice}, function (datas) {
                                                            //alert(data);
                                                            var df = JSON.stringify(datas);
                                                            var datacl = jQuery.parseJSON(df);
                                                            $("#device_version").html(datacl.stv);
                                                        });
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Device Version </label>

                                    <div class='col-sm-6'>
                                        <select id="device_version" name='device_version' class='form-control'>
                                            <option value="">Select Devices Version</option>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='name' placeholder='Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Repair Fix Price </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='repair_fix_price' placeholder='Repair Fix Price' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Problem Photo </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "problem_photo");
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
    ?></body>
</html>