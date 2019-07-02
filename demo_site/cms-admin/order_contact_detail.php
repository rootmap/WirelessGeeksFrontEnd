<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin=new cmsPlugin();
$table="order_contact_detail";
?>
<?php
if (isset($_POST['create'])) {
    extract($_POST);
    if (!empty($order_link) && !empty($_FILES['order_photo_add']['name']) && !empty($phone_number) && !empty($moto_text)) {
        include('class/uploadImage_Class.php');
        $imgclassget=new image_class();
        $order_photo_add=$imgclassget->upload_fiximage("upload", "order_photo_add", "order_photo_add_upload_" . $table_name . "_" . time());
        $insert=array('order_link'=>$order_link, 'order_photo_add'=>$order_photo_add, 'phone_number'=>$phone_number, 'moto_text'=>$moto_text, 'date'=>date('Y-m-d'), 'status'=>1);
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
    if (!empty($order_link) && !empty($phone_number) && !empty($moto_text)) {
        $updatearray=array("id"=>$id);
        if (!empty($_FILES['order_photo_add']['name'])) {
            include('class/uploadImage_Class.php');
            $imgclassget=new image_class();
            $order_photo_add_1=$imgclassget->upload_fiximage("upload", "order_photo_add", "order_photo_add_upload_" . $table_name . "_" . time());
            $order_photo_add=$order_photo_add_1;
            @unlink("upload/" . $ex_order_photo_add);
        }else {
            $order_photo_add=$ex_order_photo_add;
        }$upd2=array('order_link'=>$order_link, 'order_photo_add'=>$order_photo_add, 'phone_number'=>$phone_number, 'moto_text'=>$moto_text, 'date'=>date('Y-m-d'), 'status'=>1);
        $update_merge_array=array_merge($updatearray, $upd2);
        if ($obj->update($table, $update_merge_array) == 1) {
            $plugin->Success("Successfully Updated", $obj->filename());
        }else {
            $plugin->Error("Failed", $obj->filename());
        }
    }
}elseif (isset($_GET['del']) == "delete") {
    $delarray=array("id"=>$_GET['id']);
    $photolink=$obj->SelectAllByVal($table, 'id', $_GET['id'], 'order_photo_add');
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
            <h1 class="content-heading bg-white border-bottom">Order Contact Detail</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Order Contact Detail</a></li>
                    <li><a href="order_contact_detail_data.php">Order Contact Detail List</a></li>
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
                            <h4 class="heading">Update/Change - Order Contact Detail</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
                                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Order link </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='order_link' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "order_link"); ?>' placeholder='Order link' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Order Photo Add </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        $image_name=$obj->SelectAllByVal($table, "id", $_GET['edit'], "order_photo_add");
                                        echo $plugin->FileUploadBox("1", $image_name, "order_photo_add");
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Phone Number </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='phone_number' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "phone_number"); ?>' placeholder='Phone Number' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Moto Text </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='moto_text' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "moto_text"); ?>' placeholder='Moto Text' class='form-control' />
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
                            <h4 class="heading">Create New Order Contact Detail</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Order link </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='order_link' placeholder='Order link' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Order Photo Add </label>

                                    <div class='col-sm-3'>
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "order_photo_add");
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Phone Number </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='phone_number' placeholder='Phone Number' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Moto Text </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='moto_text' placeholder='Moto Text' class='form-control' />
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

    <?php echo $plugin->TableJs();
    echo $plugin->FileUploadJS();
    ?></body>
</html>