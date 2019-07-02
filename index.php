<?php
include('./class/db_Class.php');
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
        <title>iGeek Repair | iGeek Repair | Apple Product Repairs</title>
        <meta name="description" content="iGeek Repair professionals, iGeek Repair is proud to offer repair services for your iphones, iPad, iPod or Macbook. Come see why we are the Treasure Valley's leading Apple device repair shop!" />

        <?php
        $page_title="iGeek Repair | Wireless Geeks";
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
                        <?php

                        include('./class/nav.php');

                        $sqlbooks=array();
                        $sqlbooks=$obj->FlyQuery("SELECT * FROM order_contact_detail ORDER BY id DESC LIMIT 1");
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <div  class="clearfix"></div>
        <?php echo $obj->ShowMsg(); ?>
        <div  class="clearfix"></div>
        <div id="stretch-slide" class="fluid ">

            <?php
                        include('./class/slider.php');


            ?>

        </div>
        <div id="stretch-nav" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="nav-hold" class="fluid ">
                    <div id='cssmenu'>
        <?php
        include('./class/nav2.php');
        ?>

        </div>
                </div>
            </div>
        </div>

        <div id="stretch-mid" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="mid-left" class="fluid "><a href="<?php echo $sqlbooks[0]->order_link; ?>" target="_blank"><img src="<?php echo $obj->LbaseUrl(); ?>images/mid-book.png" alt="book iphone repair boise" class="right-space"/></a>
                    <span class="leftnav"><a href="<?php echo $sqlbooks[0]->order_link; ?>" target="_blank" style="color: #ccc;">Book An Appointment</a></span></div>
                <div id="mid-right" class="fluid "><a href="<?php echo $obj->LbaseUrl(); ?>Find-Device"><img src="<?php echo $obj->LbaseUrl(); ?>images/mid-device.png" alt="boise phone repair" class="right-space"/></a>
                    <span class="leftnav"> <a href="<?php echo $obj->LbaseUrl(); ?>Find-Device" style="color: #ccc;">Find Your Device</a></span></div>
            </div>
        </div>
        <div id="stretch-green" class="fluid ">
            <div class="gridContainer clearfix">
                <div id="green-title" class="fluid ">
                    Wireless-Geeks Trusted <br>
                    Mobile Device Repair Shop
                </div>
                <?php
                $sqlcatimg=$obj->FlyQuery("SELECT id,photo FROM category_slider_images");
                if (!empty($sqlcatimg)) {
                    ?>
                    <div id="green-left" class="fluid "><a href="<?php echo $obj->LbaseUrl(); ?>repair/1/Iphone" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('boise iphones', '', '<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $sqlcatimg[0]->photo; ?>', 1)"><img src="<?php echo $obj->LbaseUrl(); ?>images/green-iphone.png" alt="iGeek Repair" class="nobord" id="boise iphones"></a></div>
                    <div id="green-mid" class="fluid "><a href="<?php echo $obj->LbaseUrl(); ?>repair/5/Macbook" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('macbooks', '', '<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $sqlcatimg[1]->photo; ?>', 1)"><img src="<?php echo $obj->LbaseUrl(); ?>images/green-macbooks.png" alt="macbook repair boise" class="nobord" id="macbooks"></a></div>
                    <div id="green-right" class="fluid "><a href="<?php echo $obj->LbaseUrl(); ?>repair/6/Other Devices" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('devices', '', '<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $sqlcatimg[2]->photo; ?>', 1)"><img src="<?php echo $obj->LbaseUrl(); ?>images/green-other.png" alt="android repair boise" class="nobord" id="devices"></a></div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div id="main-body" class="fluid ">
            
            <div class="gridContainer clearfix">
                <div id="left-content" class="fluid "> <h1>Cell Phone Repair in&nbsp;
                        <?php
                        $sqlshops=$obj->FlyQuery("SELECT id,name FROM contact_location");
                        if (!empty($sqlshops)) {
                            $break=1;
                            foreach ($sqlshops as $shops):
                                ?>
                                <a href="<?php echo $obj->LbaseUrl(); ?>store/<?php echo $shops->id; ?>/<?php echo $obj->CleanStringDashUrl($shops->name); ?>" style="font-size: 22px; font-weight: bolder;"><?php echo $shops->name; ?></a>
                                <?php
                                if ($break != count($sqlshops)) {
                                    echo ",";
                                }
                                $break++;
                            endforeach;
                        }
                        ?>

                    </h1>
                    <p>
                        <?php
                        $sqlhomc=$obj->FlyQuery("SELECT id,home_content FROM home_page_content ORDER BY priority ASC");
                        if (!empty($sqlhomc)) {
                            foreach ($sqlhomc as $cm):
                                echo html_entity_decode($cm->home_content);
                            endforeach;
                        }
                        ?>
                    </p>

                </div>

                <?php include('./class/book.php'); ?>
            </div>
        </div>


        <style>
            /* To remove the scrollbars & close X in the Google Maps caption */
            #content {
                width: 180px;
                font-size: 16px;
            }
            .gm-style-iw + div {display: none;}
        </style>
        <?php include('./class/footer.php'); ?>
        <!-- start number replacer -->
        <!-- end ad widget -->
    </body>

</html>
