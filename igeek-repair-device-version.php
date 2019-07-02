<?php
include './class/db_Class.php';
$repair_version_id=$obj->CleanStringUrl($_GET['id']);

$repair_version_detail=$obj->FlyQuery("select a.id AS id,rd.name AS repair_device,a.name AS name,a.heading AS heading,a.device_photo AS device_photo,CASE a.photo_position WHEN 1 THEN 'left' ELSE CASE a.photo_position WHEN 2 THEN 'right' ELSE 'left' END END AS photo_position,a.device_detail AS device_detail,a.priority AS priority,a.date AS date,a.status AS status from repair_device_version as a LEFT JOIN repair_devices as rd on rd.id = a.repair_device WHERE a.id='" . $repair_version_id . "'");
if (empty($repair_version_detail)) {
    $obj->Error("Please Select A Valid Link.", $obj->LbaseUrl() . "Find-Device");
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
        $page_title="iGeek Repair | " . $repair_version_detail[0]->name . ' Repairs';
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
                <div id="main-content-sub" class="fluid ">
                    <h1><?php echo $repair_version_detail[0]->heading; ?></h1>
                    <p><img align="<?php echo $repair_version_detail[0]->photo_position; ?>" alt="" class="<?php
                        if ($repair_version_detail[0]->photo_position == "left") {
                            echo "right";
                        }else {
                            echo "left";
                        }
                        ?>-space img-responsive" height="300" src="<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $repair_version_detail[0]->device_photo; ?>"  /> <?php echo html_entity_decode($repair_version_detail[0]->device_detail); ?> </p>

                    <div class="clearfix"></div>
                    <?php
                    $sqlDevice_version=$obj->FlyQuery("SELECT
                    a.`device_version`,
                    a.`problem_name`,
                    a.`repair_fix_price`,
                    a.`problem_photo`
                    FROM
                    `repair_device_problem_view` as a
                    WHERE `device_version`='" . $repair_version_detail[0]->id . "'");
                    //print_r($sqlDevice_version);
                    if (!empty($sqlDevice_version)) {
                        ?>
                        <h1><?php echo $repair_version_detail[0]->name; ?> Repairs Include</h1>
                        <div class="clearfix"></div>
                        <?php
                        $break=1;
                        foreach ($sqlDevice_version as $version):
                            ?>
                            <div class="fluid product-display">
                                <strong class="style2">
                                    <span style="position: absolute; margin-top: 170px; margin-left: 20px; border-radius: 5px; color: #fff; font-weight: bolder; background: #008000; padding: 5px; font-size: 14px;"><?php echo $version->repair_fix_price; ?></span>
                                    <img src="<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $version->problem_photo; ?>" alt="<?php echo $version->problem_name; ?> repair" height="200" class="nobord img-responsive"/></a><br>
                                    <span class="productnav" style="font-size: 14px;"><?php echo $version->problem_name; ?></span>
                                </strong><br>
                            </div>
                            <?php
                            if ($break == 5) {
                                $break=0;
                                ?>
                                <div class="clearfix"></div>
                                <?php
                            }
                            $break++;
                        endforeach;
                    }else {
                        //other device code start
                        $sqlDevice_version=$obj->FlyQuery("SELECT
                        a.`id`,
                        a.`device_type`,
                        a.`name`,
                        a.`photo`
                        FROM
                        `repair_other_device_version` as a
                        WHERE a.`device_type`='" . $repair_version_detail[0]->id . "'");
                        //print_r($sqlDevice_version);
                        if (!empty($sqlDevice_version)) {
                            ?>
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
                            <h1 style="text-indent: 4px; width: auto; display: inline; color: #008000; border-bottom: 3px #008000 dashed;"><i class="fa fa-database" aria-hidden="true"></i> <?php echo $repair_version_detail[0]->name; ?> Version</h1>
                            <div class="clearfix"></div>
                            <?php
                            $break=1;
                            foreach ($sqlDevice_version as $version):
                                ?>
                                <div class="fluid product-display"><strong class="style2"><a href="<?php echo $obj->LbaseUrl(); ?>other-device-problem/<?php echo $version->id; ?>/<?php echo str_replace(" ", "-", $version->name); ?>">
                                            <img src="<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $version->photo; ?>" alt="<?php echo $version->name; ?> repair" height="200" class="nobord img-responsive"/></a><br>
                                        <span class="productnav" style="font-size: 14px;"><?php echo $version->name; ?></span></strong><br>
                                    <a href="<?php echo $obj->LbaseUrl(); ?>other-device-problem/<?php echo $version->id; ?>/<?php echo str_replace(" ", "-", $version->name); ?>" style="font-size: 14px; color: #000000;">View Repair Services</a>    </div>
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
                        //other device code end
                    }
                    ?>

<!--                    <p>&bull; Glass Repair - $40<br />
                        &bull; LCD Repair - $40<br />
                        &bull; Glass and LCD Repair - $60<br />
                        &bull; Power/Volume Button - $40<br />
                        &bull; Speaker - $40<br />
                        &bull; Camera - $40<br />
                        &bull; Headphone Jack - $40<br />
                        &bull; Home Button - $40<br />
                        &bull; USB Charge Port - $40<br />
                        &bull; Battery - $40</p>

                    <p>All 3G and 3GS Repairs are $40!</p>-->

                </div>

            </div>
        </div>

        <?php include('./class/footer.php'); ?>
        <!-- start number replacer -->

        <!-- end ad widget -->
    </body>

</html>
