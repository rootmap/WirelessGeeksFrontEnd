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
        $page_title='Contact Us';
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
                    <h1>Contact Us<br>



                        <span class="style2">          Phone: <?php echo $sqltop_support[0]->top_contact_number; ?></span> </h1>


                    <div id="left-content" style="width: 40%;" class="fluid ">

                        <form action="<?php echo $obj->LbaseUrl(); ?>contact-us/submit" method="post" name="form1" id="form1">
                            <p>
                                <em><span class="btmnav">(*required)</span></em><br />
                                <label for="name"></label>
                                *YOUR NAME<br />
                                <input name="name" type="text" class="form-field" id="name" size="25" />

                                <br />
                                <label for="email"></label>
                                <br>
                                *YOUR EMAIL<br />
                                <input name="email" type="text" class="form-field" id="email" size="25" />

                                <br />
                                <label for="phone"></label>
                                <br>
                                *YOUR PHONE #<br />
                                <input name="phone" type="text" class="form-field" id="phone" size="25" />

                                <br />
                                <label for="mobile phone"></label>
                                <br>
                                YOUR MOBILE #<br />
                                <input name="mobile phone" type="text" class="form-field" id="mobile phone" size="25" />

                                <br />
                                <br>
                                HOW DID YOU HEAR ABOUT US?<br />
                                <label for="how did you hear about us"></label>
                                <select name="how_did_he_or_she_hear_about_us" class="form-field" id="how did you hear about us">
                                    <option value="Please Select One" selected="selected">Please Select One</option>
                                    <option value="Television">Television</option>
                                    <option value="Radio">Radio</option>
                                    <option value="Print Ad">Print Ad</option>
                                    <option value="Search Results">Search Results</option>
                                    <option value="Website">Website</option>
                                    <option value="Referral">Referral</option>
                                    <option value="Other">Other</option>
                                </select>
                                <br />
                                <br />
                                QUESTIONS/COMMENTS:<br />
                                <label for="questions-comments"></label>
                                <textarea name="questions__comments" cols="45" rows="5" class="form-comments" id="questions-comments"></textarea>
                                <br />
                                <br />
                                <img src="http://www.idahoiphones.com/HDWFormCaptcha/FormCaptcha.php?width=180&amp;height=60&amp;letter_count=5&amp;min_size=35&amp;max_size=45&amp;noise=200&amp;noiselength=5&amp;bcolor=ffffff&amp;border=000000" width="180" height="60" id="captchaimg" alt="security code" border="0" /><br />
                                Enter Security Code:<br />
                                <input type="text" size="20" name="hdcaptcha" id="hdcaptcha" value="" />
                                <br />
                                <script type="text/javascript">function HDW_getCookie(name) {
                                        var cname = name + "=";
                                        var dc = document.cookie;
                                        dc = dc.replace(/\+/g, " ");
                                        if (dc.length > 0) {
                                            begin = dc.indexOf(cname);
                                            if (begin != -1) {
                                                begin += cname.length;
                                                end = dc.indexOf(";", begin);
                                                if (end == -1)
                                                    end = dc.length;
                                                var rt = dc.substring(begin, end);
                                                return unescape(rt);
                                            }
                                        }
                                        return null;
                                    }
                                    try {
                                        var items = document.getElementsByTagName("input");
                                        for (i = 0; i < items.length; i++)
                                            if (items[i].name != "hdcaptcha" && items[i].name != "hdwfail")
                                                try {
                                                    var ck = HDW_getCookie("hdw_" + items[i].name);
                                                    if (ck != "" && ck != null) {
                                                        if (items[i].type == "checkbox")
                                                            items[i].checked = true;
                                                        else if (items[i].type == "radio" && items[i].value == ck)
                                                            items[i].checked = true;
                                                        else
                                                            items[i].value = ck;
                                                    }
                                                } catch (e) {
                                                }
                                        var items = document.getElementsByTagName("select");
                                        for (i = 0; i < items.length; i++)
                                            try {
                                                var ck = HDW_getCookie("hdw_" + items[i].name);
                                                if (ck != "" && ck != null) {
                                                    for (j = 0; j < items[i].length; j++)
                                                        if (items[i].options[j].value == ck)
                                                            items[i].selectedIndex = j;
                                                }
                                            } catch (e) {
                                            }
                                        var items = document.getElementsByTagName("textarea");
                                        for (i = 0; i < items.length; i++)
                                            try {
                                                var ck = HDW_getCookie("hdw_" + items[i].name);
                                                if (ck != "" && ck != null)
                                                    items[i].value = ck;
                                            } catch (e) {
                                            }
                                    } catch (e) {
                                    }</script><br />
                                <input name="submit" type="submit" class="submit-button" id="submit" value="Submit" />
                                <label for="textfield"></label>
                                <input name="recipient" type="hidden" id="textfield" value="0" />
                                <label for="textfield2"></label>
                                <input name="redirect" type="hidden" id="textfield2" value="thank-you.php" />
                                <br />
                            </p>
                            <input type="hidden" name="hdwfail" id="hdwfail" value="contact.php?hdwmsg=invalid" />
                        </form>
                    </div>


                    <div id="contact-right" style="width: 58%; padding-left: 0px; margin-left: 0px;" class="fluid ">
                        <div class="col-md-12">
                            <?php
                            $contactList=$obj->FlyQuery("SELECT * FROM contact_location_view");
                            foreach ($contactList as $list):
                                ?>
                                <div class="col-md-6" style="width: 49%; display: inline-block; margin-bottom: 20px;">
                                    <span class="style2"><?php echo $list->name; ?></span>

                                    <?php echo $list->map; ?>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>


                </div>

            </div>
        </div><?php include('./class/footer.php'); ?>
        <!-- start number replacer -->
        <script type="text/javascript"><!--
        vs_account_id = "CtjSZlSRzqpdKwB4";
            //--></script>
        <script type="text/javascript" src="//adtrack.voicestar.com/euinc/number-changer.js">
        </script>
        <!-- end ad widget --></body>

</html>
