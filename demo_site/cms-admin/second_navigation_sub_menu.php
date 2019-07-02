<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin=new cmsPlugin();
$table="second_navigation_sub_menu";
?>
<?php
if (isset($_POST['create'])) {
    extract($_POST);
    if (!empty($main_menu) && !empty($menu_name) && !empty($menu_link) && !empty($priority)) {
        $insert=array('main_menu'=>$main_menu, 'menu_name'=>$menu_name, 'menu_link'=>$menu_link, 'priority'=>$priority, 'date'=>date('Y-m-d'), 'status'=>1);
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
    if (!empty($main_menu) && !empty($menu_name) && !empty($menu_link) && !empty($priority)) {
        $updatearray=array("id"=>$id);
        $upd2=array('main_menu'=>$main_menu, 'menu_name'=>$menu_name, 'menu_link'=>$menu_link, 'priority'=>$priority, 'date'=>date('Y-m-d'), 'status'=>1);
        $update_merge_array=array_merge($updatearray, $upd2);
        if ($obj->update($table, $update_merge_array) == 1) {
            $plugin->Success("Successfully Updated", $obj->filename());
        }else {
            $plugin->Error("Failed", $obj->filename());
        }
    }
}elseif (isset($_GET['del']) == "delete") {
    $delarray=array("id"=>$_GET['id']);
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
        ?>
    </head>
    <body class="">
        <?php
        include('include/topnav.php');
        include('include/mainnav.php');
        ?>





        <div id="content">
            <h1 class="content-heading bg-white border-bottom">Second Navigation Sub Menu</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Second Navigation Sub Menu</a></li>
                    <li><a href="second_navigation_sub_menu_data.php">Second Navigation Sub Menu List</a></li>
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
                            <h4 class="heading">Update/Change - Second Navigation Sub Menu</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form  class="form-horizontal" method="post" action="" role="form">
                                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Main Menu </label>

                                    <div class='col-sm-6'>
                                        <?php $main_menu=$obj->SelectAllByVal($table, "id", $_GET['edit'], "main_menu"); ?>
                                        <select name="main_menu"  class='form-control'>
                                            <option value="0">Select Main Menu</option>
                                            <?php
                                            $sqlnavt=$obj->FlyQuery("SELECT id,menu_name FROM second_navigation_bar ORDER BY priority ASC");
                                            if (!empty($sqlnavt)) {
                                                foreach ($sqlnavt as $dm):
                                                    ?>
                                                    <option <?php if ($main_menu == $dm->id) { ?> selected="selected" <?php } ?> value="<?php echo $dm->id; ?>"><?php echo $dm->menu_name; ?></option>
                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Menu Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='menu_name' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "menu_name"); ?>' placeholder='Menu Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Menu Link </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='menu_link' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "menu_link"); ?>' placeholder='Menu Link' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Priority </label>

                                    <div class='col-sm-6'>
                                        <input type='number' id='form-field-1' name='priority' placeholder='Priority'  value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "priority"); ?>'  class='form-control' />
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
                            <h4 class="heading">Create New Second Navigation Sub Menu</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form  class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Main Menu </label>

                                    <div class='col-sm-6'>
                                        <select name="main_menu"  class='form-control'>
                                            <option value="0">Select Main Menu</option>
                                            <?php
                                            $sqlnavt=$obj->FlyQuery("SELECT id,menu_name FROM second_navigation_bar ORDER BY priority ASC");
                                            if (!empty($sqlnavt)) {
                                                foreach ($sqlnavt as $dm):
                                                    ?>
                                                    <option value="<?php echo $dm->id; ?>"><?php echo $dm->menu_name; ?></option>
                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Menu Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='menu_name' placeholder='Menu Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Menu Link </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1'  value="<?php echo $obj->LbaseUrl(); ?>"  name='menu_link' placeholder='Menu Link' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Priority </label>

                                    <div class='col-sm-6'>
                                        <input type='number' id='form-field-1' name='priority' placeholder='Priority' class='form-control' />
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

    <?php echo $plugin->TableJs(); ?></body>
</html>