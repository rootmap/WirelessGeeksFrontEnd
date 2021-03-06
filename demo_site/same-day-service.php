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
        <title>Fast iPhone Repair in Boise | Idaho iRepair | Apple Product Repairs</title>
        <meta name="description" content="Idaho iRepair can repair your iPhone, iPod, iPad or Mac computer the same day. We proudly offer same-day service on almost all jobs, with most in just 30 minutes." />
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
    <body onLoad="MM_preloadImages('<?php echo $obj->LbaseUrl(); ?>images/but-find-store-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/button-highest-quality-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/button-fast-reliable-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/button-satisfaction-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/green-iphone-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/green-macbooks-ov.png', '<?php echo $obj->LbaseUrl(); ?>images/green-other-ov.png')">

        <?php include('./class/top.php'); ?>

        <div id="stretch-nav" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="nav-hold" class="fluid ">
                    <div id='cssmenu'>
                        <?php
                        include('./class/nav.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="main-body-sub" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="main-content-sub" class="fluid ">
                    <h1>Same-Day Service</h1>
                    <p><img src="images/clock.png" alt="" align="left"/>Most repairs are guaranteed complete within 1 day or less. <br />
                        <br />
                        Most iPhone repairs can be done within 30 minutes to an hour. You can sit and wait in our comfortable store as we work on your phone, or come back and pick it up once it's ready. We are located in downtown in the BODO district next to Edwards. This means, there is plenty to do around our store if you want to do some shopping and come back to pick up your device. <br />
                        <br />
                        If you have specific questions regarding our individual services, contact us at 248.834.3357 or by <a href="http://www.idahoiphones.com/contact.php">filling out our contact form</a>. </p>        </div>

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
