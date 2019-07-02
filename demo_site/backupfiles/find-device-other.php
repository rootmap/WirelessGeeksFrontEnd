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
        <title>Find Your Device | iGeek Repair | Apple Product Repairs</title>
        <meta name="description" content="iGeek Repair professionals, iGeek Repair is proud to offer repair services for your iphones, iPad, iPod or Macbook. Find Your Device." />
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
    <body onLoad="MM_preloadImages('images/green-iphone-ov.png', 'images/green-macbooks-ov.png', 'images/green-other-ov.png', 'images/button-highest-quality-ov.png', 'images/button-fast-reliable-ov.png', 'images/button-satisfaction-ov.png')">

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

        <div id="main-body-sub" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="main-content-sub" class="fluid ">
                    <div class="fluid product-bottom">

                        <div class="fluid product-bottom">
                            <h2>Other Devices</h2>

                            <p style="text-align: center;"><span style="color: rgb(81, 81, 81); font-family: tex; font-size: 22px;">We will beat any competitors price by 10%!</span></p>

                            <p style="text-align: center;"><a href="http://www.idahoiphones.com/contact.php">CONTACT US BY SENDING US AN EMAIL or phone at 248.834.3357 for the LOWEST PRICES!&nbsp;</a><br />
                                <br />
                                <span class="leftnav"><a href="http://www.genbook.com/bookings/slot/reservation/30201806?bookingSourceId=3001" target="_blank">BOOK AN APPOINTMENT WITH iGeek Repair TODAY!</a></span></p>
                        </div>
                        <br>
                    </div>


                    <div class="fluid product-display-left"><strong class="style2"><a href="other-devices-samsung.php" target="_blank"><img src="images/other-samsung.png" alt="boise iphone 3" class="nobord"/></a><br>
                            <span class="productnav">Samsung Devices</span></strong><br>
                        <a href="other-devices-samsung.php">View Repair Services</a></div>
                    <div class="fluid product-display"><strong class="style2"><a href="other-devices-HTC.php" target="_blank"><img src="images/other-samsung.png" alt="boise iphone 3" class="nobord"/></a><a href="iphone-repair-4.php"></a><br>
                            <span class="productnav">HTC Devices</span></strong><br>
                        <a href="other-devices-HTC.php">View Repair Services</a>    </div>
                    <div class="fluid product-display"><strong class="style2"><a href="other-devices-lg.php" target="_blank"><img src="images/other-samsung.png" alt="boise iphone 3" class="nobord"/></a><a href="iphone-repair-5.php"></a><br>
                            <span class="productnav">LG Devices</span></strong><br>
                        <a href="other-devices-lg.php">View Repair Services</a>    </div>
                    <div class="fluid product-display"><span class="style2"><a href="iphone-repair-5s.php"><img src="images/other-samsung.png" alt="boise iphone 3" class="nobord"/></a><br>
                        </span><span class="productnav">Motorola Devices</span><br>
                        <a href="other-devices-motorola.php">View Repair Services</a>    </div>
                    <div class="fluid product-display"></div>

                    <div class="fluid product-display"><span class="style2"><br>
                        </span></div>

                    <div class="fluid product-bottom"><br>
                        <br>
                    </div>
                    <p>

                    </p>
                </div>

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
