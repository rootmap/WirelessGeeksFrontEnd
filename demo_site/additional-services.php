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
        $page_title='Additional Services';
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

        <?php include('class/top.php'); ?>

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
                    <h1>Additional Services offered by iGeek Repair</h1>
                    <?php
                    $sqladitionalservices=$obj->FlyQuery("SELECT * FROM additional_services_offered_view");
                    if (!empty($sqladitionalservices)) {
                        foreach ($sqladitionalservices as $services):
                            ?>
                            <p>
                                <img align="left" alt="<?php echo $services->title; ?>" class="right-space" src="<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $services->thumble_photo; ?>" />
                                <?php echo $services->title; ?> - <?php echo html_entity_decode($services->short_description); ?>
                                <br />
                                <a href="<?php echo $obj->LbaseUrl(); ?>AD-SE/<?php echo $services->id; ?>/<?php echo $obj->CleanStringDashUrl($services->title); ?>" style="line-height: 1.8em;">Read more about <?php echo $services->title; ?> services.</a>
                            </p>
                            <div class="clearfix"></div>
                            <?php
                        endforeach;
                    }
                    ?>
                </div>

            </div>
        </div>

        <?php include('./class/footer.php'); ?>
        <!-- start number replacer -->
        <!-- end ad widget -->
    </body>

</html>
