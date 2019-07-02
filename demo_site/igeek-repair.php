<?php
include './class/db_Class.php';
$repair_id=$obj->CleanStringUrl($_GET['id']);
$repair_detail=$obj->FlyQuery("SELECT a.`id`,a.`name`,a.`repair_page_heading`,a.`repair_page_sub_heading`,a.`device_photo`,
case a.`photo_position`
WHEN 1 THEN 'left'
ELSE CASE a.`photo_position`
WHEN 2 THEN 'right'
ELSE 'left' END END as photo_position,a.`device_detail`,a.`priority`,a.`date`,a.`status` FROM repair_devices_view as a WHERE a.id='" . $repair_id . "'");
if (empty($repair_detail)) {
    $obj->Error("Invalid Request, Please Try Another.", $obj->LbaseUrl() . "Find-Device");
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="">
    <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        $page_title="iGeek Repair | " . $repair_detail[0]->name . ' Repairs';
        include('./class/seo_set.php');
        ?>
        <link href="<?php echo $obj->LbaseUrl(); ?>css/boilerplate.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $obj->LbaseUrl(); ?>css/fluid-grid.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $obj->LbaseUrl(); ?>css/main.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $obj->LbaseUrl(); ?>css/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $obj->LbaseUrl(); ?>css/nivo-slider.css" rel="stylesheet" type="text/css">
        <!--
        To learn more about the conditional comments around the html tags at the top of the file:
        paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

        Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
        * insert the link to your js here
        * remove the link below to the html5shiv
        * add the "no-js" class to the html tags at the top
        * you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build
        -->
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?php echo $obj->LbaseUrl(); ?>js/respond.min.js"></script>
        <script src='<?php echo $obj->LbaseUrl(); ?>js/jquery-1.10.2.js'></script>
        <script type='text/javascript' src='<?php echo $obj->LbaseUrl(); ?>js/menu_jquery.js'></script>
        <script src="<?php echo $obj->LbaseUrl(); ?>js/jquery.nivo.slider.pack.js" type="text/javascript"></script>

    </head>
    <body onLoad="MM_preloadImages('<?php echo $obj->LbaseUrl(); ?>images/green-iphone-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/green-macbooks-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/green-other-ov.png')">

        <?php include('./class/top.php'); ?>

        <div id="stretch-nav" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="nav-hold" class="fluid ">
                    <div id='cssmenu'>
                        <?php include('./class/nav.php'); ?>
                    </div>
                </div>
            </div>
        </div>


        <div  class="clearfix"></div>
        <?php echo $obj->ShowMsg(); ?>
        <div  class="clearfix"></div>

        <div id="main-body-sub" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="main-content-sub" class="fluid "> <h1 style="text-align: center;"><?php echo $repair_detail[0]->repair_page_heading; ?><br />
                        <?php echo $repair_detail[0]->repair_page_sub_heading; ?></h1>

                    <p>
                        <?php
                        if (file_exists($obj->LbaseUrl() . "cms-admin/upload/" . $repair_detail[0]->device_photo)) {
                            ?>
                            <img align="<?php echo $repair_detail[0]->photo_position; ?>" alt="" class="right-space img-responsive" height="308" src="<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $repair_detail[0]->device_photo; ?>" width="303" />
                            <?php
                        }
                        ?>
                        <?php echo html_entity_decode($repair_detail[0]->device_detail); ?>
                    </p>

                    <h2><strong><br>
                            Choose Your Phone</strong><br>
                    </h2>
                    <div class="clearfix"></div>
                    <?php
                    $sqlDevice_version=$obj->FlyQuery("SELECT b.id,b.name,b.device_photo,b.repair_device FROM repair_device_version as b WHERE b.repair_device='" . $repair_detail[0]->id . "'");
                    if (!empty($sqlDevice_version)) {
                        $break=1;
                        foreach ($sqlDevice_version as $version):
                            ?>
                            <div class="fluid product-display"><strong class="style2"><a href="<?php echo $obj->LbaseUrl(); ?>device-repair/<?php echo $version->id; ?>/<?php echo str_replace(" ", "-", $version->name); ?>"><img src="<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $version->device_photo; ?>" alt="<?php echo $version->name; ?> repair" height="200" class="nobord img-responsive"/></a><br>
                                    <span class="productnav" style="font-size: 14px;"><?php echo $version->name; ?></span></strong><br>
                                <a href="<?php echo $obj->LbaseUrl(); ?>device-repair/<?php echo $version->id; ?>/<?php echo str_replace(" ", "-", $version->name); ?>" style="font-size: 14px; color: #000000;">View Repair Services</a>    </div>
                            <?php
                            if ($break == 5) {
                                $break=0;
                                ?>
                                <div class="clearfix"></div>
                                <?php
                            }
                            $break++;
                        endforeach;
                    }
                    ?>

                    <br>
                    <br>
                    <!--                    <div id="content-sub" class="fluid">
                                            <p>&nbsp;</p>
                                            <p>
                                                <link href="css/main.css" rel="stylesheet" type="text/css" />
                                            <hr>
                                            <p><strong class="style2"><br>
                                                    <a href="contact.php">CONTACT US BY SENDING US AN EMAIL or phone at 248.834.3357 for the LOWEST PRICES! </a><br>
                                                    <br>
                                                    <a href="http://www.genbook.com/bookings/slot/reservation/30201806?bookingSourceId=3001" target="_blank"><img src="<?php echo $obj->LbaseUrl(); ?>images/mid-book.png" alt="book online" width="69" height="73" class="right-space" align="left"/></a><span class="leftnav"><a href="http://www.genbook.com/bookings/slot/reservation/30201806?bookingSourceId=3001" target="_blank"><br>
                                                            Book An Appointment with iGeek Repair today!</a></span>

                                            </p>

                                            <p>&nbsp; </p>
                                        </div>-->

                </div>
            </div>

            <?php include('./class/footer.php'); ?>
            <!-- start number replacer -->
            <script type="text/javascript"><!--
            vs_account_id = "CtjSZlSRzqpdKwB4";
                //--></script>
            <script type="text/javascript" src="//adtrack.voicestar.com/euinc/number-changer.js">
            </script>
            <!-- end ad widget -->
    </body>

</html>
