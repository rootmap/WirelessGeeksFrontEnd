<?php
include './class/db_Class.php';
$sqlpage_detail=$obj->FlyQuery("SELECT a.`id`,
        a.`page_name`,
        a.`page_moto`,
        a.`heading`,
        a.`page_photo`,
        a.`photo`,
        CASE a.`photo_position` WHEN '1' THEN 'left'
        ELSE CASE a.`photo_position` WHEN '1' THEN 'left'
        ELSE 'left'
        END
        END AS photo_position,
        a.`page_content`,
        a.`date`,
        a.`status` FROM `other_page_info` as a WHERE a.id='" . $_GET['id'] . "'");
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
        $page_title="iGeek Repair | " . $sqlpage_detail[0]->page_name;
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


    </head>
    <body onLoad="MM_preloadImages('<?php echo $obj->LbaseUrl(); ?>images/green-iphone-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/green-macbooks-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/green-other-ov.png')">

        <?php
        include './class/top.php';
        ?>
        <div id="stretch-nav" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="nav-hold" class="fluid ">
                    <div id='cssmenu'>
                        <?php include('./class/nav.php'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (!empty($sqlpage_detail)) {
            ?>
            <div id="main-body-sub" class="fluid ">
                <div class="gridContainer clearfix">
                    <div id="main-content-sub" class="fluid ">
                        <h3 style="padding-bottom: 0px;" class="text-success"><?php echo $sqlpage_detail[0]->page_name; ?></h3>
                        <p><?php echo $sqlpage_detail[0]->page_moto; ?></p>

                        <p><img align="<?php echo $sqlpage_detail[0]->photo_position; ?>" alt="" height="212" src="<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $sqlpage_detail[0]->photo; ?>" width="211" />
                            <?php echo html_entity_decode($sqlpage_detail[0]->page_content); ?>
                        </p>

                        <h1>&nbsp;</h1>
                    </div>

                </div>
            </div>

            <?php
        }
        include('./class/footer.php');
        ?>
        <!-- start number replacer -->
        <!-- end ad widget -->
    </body>

</html>
