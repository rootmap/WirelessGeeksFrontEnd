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
        <title>Find Your Device | Idaho iRepair | Apple Product Repairs</title>
        <meta name="description" content="Boise iphone repair professionals, Idaho iRepair is proud to offer repair services for your iphones, iPad, iPod or Macbook. Find Your Device." />
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

        <div id="stretch-topbar" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="mobile-banner-icons" class="fluid ">
                    <span class="banner-hours">OPEN MON-SAT 9:00-8:00 ,WALMART LOCATIONS ALSO OPEN SUN 11:00-5:00</span> <br>
                    <a href="https://www.facebook.com/IdahoIphones?ref=ts&fref=ts" target="_blank"><img src="images/banner-fb.png" alt="boise iphone repair facebook" class="nobord"/></a> <a href="https://twitter.com/IdahoiRepair" target="_blank"><img src="images/banner-twit.png" alt="iphone repair twitter"/></a> <a href="https://www.instagram.com/idahoirepair/ " target="_blank"><img class="banner-instagram" src="images/banner-instagram.png" /></a> <a href="mailto:info@idahoirepair.com"><img src="images/banner-mail.png" alt="iphone repair contact"/></a> <a href="http://www.genbook.com/bookings/slot/reservation/30201806?bookingSourceId=3001" target="_blank"><img src="images/banner-book.png" alt="book online" class="nobord"/></a>
                </div>

                <div id="banner-icons" class="fluid "><span class="banner-hours">OPEN MON-SAT 9:00-8:00 ,WALMART LOCATIONS ALSO OPEN SUN 11:00-5:00</span> <a href="https://www.facebook.com/IdahoIphones?ref=ts&fref=ts" target="_blank"><img src="images/banner-fb.png" alt="boise iphone repair facebook" class="nobord"/></a> <a href="https://twitter.com/IdahoiRepair" target="_blank"><img src="images/banner-twit.png" alt="iphone repair twitter"/></a> <a href="https://www.instagram.com/idahoirepair/ " target="_blank"><img class="banner-instagram" src="images/banner-instagram.png" /></a> <a href="mailto:info@idahoirepair.com"><img src="images/banner-mail.png" alt="iphone repair contact"/></a> <a href="http://www.genbook.com/bookings/slot/reservation/30201806?bookingSourceId=3001" target="_blank"><img src="images/banner-book.png" alt="book online" class="nobord"/></a></div>
            </div>
        </div>
        <div id="stretch-banner" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="banner-logo" class="fluid "><a href="index.php"><img src="images/banner-logo.png" alt="boise iphone repair" class="nobord"/></a></div>
                <div id="banner-phone" class="fluid ">
                    we're ready to help!<br>
                    <span class="banner-phone">248.834.3357</span> </div>
            </div>
        </div>

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
                    <h2>Apple Products</h2><br>
                    <div class="fluid product-display-left"><strong class="style2"><a href="iphone-repair-3.php" target="_blank"><img src="images/boise-iphone-3.png" alt="boise iphone 3" class="nobord"/></a><br>
                            <span class="productnav">iPhone 3G/3GS</span></strong><br>
                        <a href="iphone-repair-3.php">View Repair Services</a></div>
                    <div class="fluid product-display"><strong class="style2"><a href="iphone-repair-4.php"><img src="images/boise-iphone-4.png" alt="boise iphone4 repair" class="nobord"/></a><br>
                            <span class="productnav">iPhone 4/4S</span></strong><br>
                        <a href="iphone-repair-4.php">View Repair Services</a>    </div>
                    <div class="fluid product-display"><strong class="style2"><a href="iphone-repair-5.php"><img src="images/boise-iphone-5.png" alt="boise iphone 5 repair" class="nobord"/></a><br>
                            <span class="productnav">iPhone 5</span></strong><br>
                        <a href="iphone-repair-5.php">View Repair Services</a>    </div>
                    <div class="fluid product-display"><span class="style2"><a href="iphone-repair-5s.php"><img src="images/boise-iphone-5s.png" alt="" width="151" height="201" class="nobord"/></a><br>
                        </span><span class="productnav">iPhone 5s</span><br>
                        <a href="iphone-repair-5s.php">View Repair Services</a>    </div>
                    <div class="fluid product-display"><span class="style2"><a href="iphone-repair-5c.php"><img src="images/boise-iphone-5c.png" alt="" width="122" height="199" class="nobord"/></a><br>
                        </span><span class="productnav">iPhone 5c</span><br>
                        <a href="iphone-repair-5c.php">View Repair Services</a>    </div>
                    <div class="fluid product-display"><span class="style2"><a href="iphone-repair-6.php"><img src="images/boise-iphone-6.png" alt="" width="101" height="200" class="nobord"/></a><br>
                        </span><span class="productnav">iPhone 6</span><br>
                        <a href="iphone-repair-6.php">View Repair Services</a>    </div>
                    <div class="fluid product-display-left"><strong class="style2"><a href="iphone-repair-6plus.php" target="_blank"><img src="images/iphone6-plus.png" alt="boise iphone 3" height="220" class="nobord"/></a><br>
                            <span class="productnav">iPhone 6 Plus</span></strong><br>
                        <a href="iphone-repair-6plus.php">View Repair Services</a></div>

                    <div class="fluid product-display"><span class="style2"><br>
                        </span></div>

                    <div class="fluid product-bottom"><br>
                        <br>
                        <br>
                        <h2>Other Devices</h2>
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
                    <div class="fluid product-display"><span class="style2"><a href="iphone-repair-5s.php"><strong class="style2"><a href="other-devices-motorola.php" target="_blank"><img src="images/other-samsung.png" alt="boise iphone 3" class="nobord"/></a></strong></a><br>
                        </span><span class="productnav">Motorola Devices</span><br>
                        <a href="other-devices-motorola.php">View Repair Services</a>    </div>
                    <div class="fluid product-display"></div>

                    <div class="fluid product-display"><span class="style2"><br>
                        </span></div>

                    <div class="fluid product-bottom"><br>
                        <br>
                    </div> <p>

                    </p>
                </div>

            </div>
        </div>

        <div id="stretch-boxes" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="box-1" class="fluid "><a href="genuine-replacement-parts.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('highest quality', '', 'images/button-highest-quality-ov.png', 1)"><img src="images/button-highest-quality.png" alt="iphone parts boise" class="nobord" id="highest quality"></a></div>
                <div id="box-2" class="fluid "><a href="same-day-service.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('fast and reliable', '', 'images/button-fast-reliable-ov.png', 1)"><img src="images/button-fast-reliable.png" alt="fast service iphone repair boise" class="nobord" id="fast and reliable"></a></div>
                <div id="box-3" class="fluid "><a href="satisfaction-guaranteed.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('satisfaction guaranteed', '', 'images/button-satisfaction-ov.png', 1)"><img src="images/button-satisfaction.png" alt="satisfaction guaranteed" class="nobord" id="satisfaction guaranteed"></a></div>
            </div>
        </div>
        <div id="stretch-footer" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="foot-left" class="fluid "><a href="index.php"><img src="images/foot-logo.png" alt="boise iphone repair" class="nobord"/></a></div>
                <div id="foot-center" class="fluid ">
                    Call Us Today!<br>
                    <span class="banner-phone">248.834.3357</span><br>
                    <a href="https://www.facebook.com/IdahoIphones?ref=ts&fref=ts" target="_blank"><img src="images/foot-fb.png" alt="iphone repair boise facebook" class="nobord"/></a> <a href="https://twitter.com/IdahoiRepair" target="_blank"><img src="images/foot-twit.png" alt="boise iphone repair twitter"/></a> <a href="https://www.instagram.com/idahoirepair/ " target="_blank"><img class="banner-instagram" src="images/banner-instagram-foot.png" /></a> <a href="mailto:idahoirepair@gmail.com"><img src="images/foot-mail.png" alt="boise iphone repair email" class="nobord"/></a> <a href="http://www.genbook.com/bookings/slot/reservation/30201806?bookingSourceId=3001" target="_blank"><img src="images/foot-book.jpg" alt="boise iphone repair email" class="nobord"/></a></div>
                <div id="footlinks1" class="fluid ">
                    <span class="btmnav"><a href="boise-iphone-repair.php">iPhone Repair</a></span><br>
                    <span class="btmnav"><a href="boise-ipad-repair.php">iPad Repair</a></span><br>
                    <span class="btmnav"><a href="boise-ipod-repair.php">iPod Repair</a></span><br>
                    <span class="btmnav"><a href="boise-macbook-repair.php">Macbook Repair</a></span><br>
                    <span class="btmnav"><a href="boise-imac-repair.php">iMac Repair</a></span><br>
                </div>
                <div id="footlinks2" class="fluid ">
                    <span class="btmnav"><a href="find-device-other.php">Other Devices</a></span> <br>
                    <span class="btmnav"><a href="additional-services.php">More Services</a></span> <br>
                    <span class="btmnav"><a href="additional-services-sell.php">Sell Your Device</a></span><br>
                    <span class="btmnav"><a href="satisfaction-guaranteed.php">Satisfaction Guarantee</a></span><br>
                    <span class="btmnav"><a href="contact.php">Contact Us</a></span> </div>

            </div>
        </div>
        <div id="stretch-foot-bottom" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="foot-copyright" class="fluid ">
                    <span class="foot-copyright"> © 2016  Idaho iRepair. All Rights Reserved. Site by Thrive,  <a href="http://www.thrivewebdesigns.com" target="_blank">Boise Web Design</a> Co. </span><br>
                    <span class="foot-copyright">This site is not affiliated with Apple Inc. All trademarks and copyrights are the property of their respective owners</span>. </div>
            </div>
        </div>
        <!-- start number replacer -->
        <script type="text/javascript"><!--
        vs_account_id = "CtjSZlSRzqpdKwB4";
            //--></script>
        <script type="text/javascript" src="//adtrack.voicestar.com/euinc/number-changer.js">
        </script>
        <!-- end ad widget --></body>

</html>
