<?php
$sqltop=array();
$sqltop=$obj->FlyQuery("SELECT * FROM message_and_social_link ORDER BY id DESC LIMIT 1");
$sqltop_support=array();
$sqltop_support=$obj->FlyQuery("SELECT * FROM site_contact_and_support ORDER BY id DESC LIMIT 1");
?>
<div id="stretch-topbar" class="fluid ">
    <div class="gridContainer clearfix">
        <div id="mobile-banner-icons" class="fluid ">
            <span class="banner-hours"><?php echo $sqltop[0]->message_top; ?></span> <br>
            <a href="<?php echo $sqltop[0]->facebook; ?>" target="_blank"><img src="<?php echo $obj->LbaseUrl(); ?>images/banner-fb.png" alt="iGeek Repair facebook" class="nobord"/></a>
            <a href="<?php echo $sqltop[0]->twitter; ?>" target="_blank"><img src="<?php echo $obj->LbaseUrl(); ?>images/banner-twit.png" alt="iphone repair twitter"/></a>
            <a href="<?php echo $sqltop[0]->instagram; ?> " target="_blank"><img class="banner-instagram" src="<?php echo $obj->LbaseUrl(); ?>images/banner-instagram.png" /></a>
            <a href="mailto:<?php echo $sqltop[0]->email; ?>"><img src="<?php echo $obj->LbaseUrl(); ?>images/banner-mail.png" alt="iphone repair contact"/></a>
            <a href="http://www.genbook.com/bookings/slot/reservation/30201806?bookingSourceId=3001" target="_blank"><img src="<?php echo $obj->LbaseUrl(); ?>images/banner-book.png" alt="book online" class="nobord"/></a>
        </div>

        <div id="banner-icons" class="fluid "><span class="banner-hours"><?php echo $sqltop[0]->message_top; ?></span>
            <a href="<?php echo $sqltop[0]->facebook; ?>" target="_blank"><img src="<?php echo $obj->LbaseUrl(); ?>images/banner-fb.png" alt="iGeek Repair facebook" class="nobord"/></a>
            <a href="<?php echo $sqltop[0]->twitter; ?>" target="_blank"><img src="<?php echo $obj->LbaseUrl(); ?>images/banner-twit.png" alt="iphone repair twitter"/></a>
            <a href="<?php echo $sqltop[0]->instagram; ?>" target="_blank"><img class="banner-instagram" src="<?php echo $obj->LbaseUrl(); ?>images/banner-instagram.png" /></a>
            <a href="mailto:<?php echo $sqltop[0]->email; ?>"><img src="<?php echo $obj->LbaseUrl(); ?>images/banner-mail.png" alt="iphone repair contact"/></a>
            </div>
    </div>
</div>

<div id="stretch-banner" class="fluid ">
    <div class="gridContainer clearfix">
        <div id="banner-logo" class="fluid "><a href="<?php echo $obj->LbaseUrl(); ?>home"><img src="<?php echo $obj->LbaseUrl(); ?>images/banner-logo.png" alt="iGeek Repair" class="nobord"/></a></div>
        <div id="banner-phone" class="fluid ">
            <?php echo $sqltop_support[0]->top_message; ?><br>
            <span class="banner-phone"><?php echo $sqltop_support[0]->top_contact_number; ?></span> </div>
    </div>
</div>
