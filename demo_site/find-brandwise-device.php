<?php
include './class/db_Class.php';
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
        $page_title='Find Your Device | Apple | Samsung | HTC | Motorola';
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
    <body onLoad="MM_preloadImages('<?php echo $obj->LbaseUrl(); ?>images/but-find-store-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/button-highest-quality-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/button-fast-reliable-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/button-satisfaction-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/green-iphone-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/green-macbooks-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/green-other-ov.png')">

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
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
                    <h1 style="text-indent: 4px; width: auto; display: inline; color: #008000; border-bottom: 3px #008000 dashed;"><i class="fa fa-database" aria-hidden="true"></i> Apple Products</h1>
                    <div class="clearfix"></div>
                    <?php
                    $array_other=array(3, 4, 5, 6, 7, 8, 9);
                    $sqlDevice_version=$obj->FlyQuery("SELECT b.id,b.name,b.device_photo,b.repair_device FROM repair_device_version as b");
                    if (!empty($sqlDevice_version)) {
                        $break=1;
                        foreach ($sqlDevice_version as $version):
                            if (!in_array($version->id, $array_other)) {
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
                            }
                        endforeach;
                    }
                    ?>

                    <div class="fluid product-display"><span class="style2"><br>
                        </span></div>

                    <?php
                    $sqlDevice_version=$obj->FlyQuery("SELECT
                    a.`id`,
                    a.`device_type`,
                    a.`name`,
                    a.`photo`
                    FROM
                    `repair_other_device_version` as a");
                    //print_r($sqlDevice_version);
                    if (!empty($sqlDevice_version)) {
                        ?>
                        <div class="clearfix"></div>
                        <br />
                        <br />
                        <br />
                        <br />
                        <h1 style="text-indent: 4px;  width: auto; display: inline; color: #008000; border-bottom: 3px #008000 dashed;"><i class="fa fa-database" aria-hidden="true"></i> Other Devices</h1>
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
                    ?>
                    <div class="fluid product-display"><span class="style2"><br>
                        </span></div>

                    <div class="fluid product-bottom"><br>
                        <br>
                    </div> <p>

                    </p>
                </div>

            </div>
        </div>

        <?php include('./class/footer.php');
        ?>
        <!-- end ad widget --></body>

</html>
