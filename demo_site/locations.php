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
        $page_title="All Repair Shops Locations | iGeek Repair | Wireless Geeks";
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
        <script type="text/javascript">
            function MM_swapImgRestore() { //v3.0
                var i, x, a = document.MM_sr;
                for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++)
                    x.src = x.oSrc;
            }
            function MM_preloadImages() { //v3.0
                var d = document;
                if (d.images) {
                    if (!d.MM_p)
                        d.MM_p = new Array();
                    var i, j = d.MM_p.length, a = MM_preloadImages.arguments;
                    for (i = 0; i < a.length; i++)
                        if (a[i].indexOf("#") != 0) {
                            d.MM_p[j] = new Image;
                            d.MM_p[j++].src = a[i];
                        }
                }
            }

            function MM_findObj(n, d) { //v4.01
                var p, i, x;
                if (!d)
                    d = document;
                if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
                    d = parent.frames[n.substring(p + 1)].document;
                    n = n.substring(0, p);
                }
                if (!(x = d[n]) && d.all)
                    x = d.all[n];
                for (i = 0; !x && i < d.forms.length; i++)
                    x = d.forms[i][n];
                for (i = 0; !x && d.layers && i < d.layers.length; i++)
                    x = MM_findObj(n, d.layers[i].document);
                if (!x && d.getElementById)
                    x = d.getElementById(n);
                return x;
            }

            function MM_swapImage() { //v3.0
                var i, j = 0, x, a = MM_swapImage.arguments;
                document.MM_sr = new Array;
                for (i = 0; i < (a.length - 2); i += 3)
                    if ((x = MM_findObj(a[i])) != null) {
                        document.MM_sr[j++] = x;
                        if (!x.oSrc)
                            x.oSrc = x.src;
                        x.src = a[i + 2];
                    }
            }
        </script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-38552655-1']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-37762602-14']);
            _gaq.push(['_trackPageview']);
            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>

        <!-- Google Code for Booked Repair Conversion Page -->
        <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 988797756;
            var google_conversion_language = "en";
            var google_conversion_format = "3";
            var google_conversion_color = "ffffff";

            var google_conversion_label = "f__ACNzbqlgQvLa_1wM";
            var google_remarketing_only = false;
            /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/988797756/?label=f__ACNzbqlgQvLa_1wM&amp;guid=ON&amp;script=0"/>
    </div>
    </noscript>

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



    <div  class="clearfix"></div>
    <?php echo $obj->ShowMsg(); ?>
    <div  class="clearfix"></div>
    <div id="main-body-sub" class="fluid ">
        <div class="gridContainer clearfix">
            <div id="main-content-sub" class="fluid ">
                <h1>Locations</h1><br><br>
                <p>
                    <?php
                    $locationList=$obj->FlyQuery("SELECT * FROM contact_location_view");
                    if (!empty($locationList))
                        foreach ($locationList as $list):
                            ?>
                        <div id="map-1" style="display: inline-block;">
                            <span class="style2"><strong><?php echo $list->name; ?></strong><br> <?php echo $list->telephone; ?>
                            </span>
                            <br>
                            <?php echo $list->map; ?><br>
                            <span class="page-button"><a href="<?php echo $obj->LbaseUrl(); ?>store/<?php echo $list->id; ?>/<?php echo str_replace(" ", "-", $list->name); ?>">View More Information</a></span>
                        </div>
                    <?php endforeach; ?>















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
