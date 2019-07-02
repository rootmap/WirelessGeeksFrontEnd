<div id="stretch-boxes" class="fluid ">
    <div class="gridContainer clearfix">
        <?php
        $sqlspecialpages=$obj->FlyQuery("SELECT a.`id`,
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
        a.`status` FROM `other_page_info` as a");
        if (!empty($sqlspecialpages)) {
            $r=1;
            foreach ($sqlspecialpages as $pages):
                ?>
                <div id="box-<?php echo $r; ?>" class="fluid "><a href="<?php echo $obj->LbaseUrl() . 'Page/' . $pages->id . '/' . $obj->CleanStringDashUrl($pages->page_name); ?>"><img src="<?php echo $obj->LbaseUrl(); ?>cms-admin/upload/<?php echo $pages->page_photo; ?>" alt="iphone parts boise" class="nobord" id="<?php echo $pages->name; ?>"></a></div>
                <?php
                if ($r == 3) {
                    $r=0;
                }
                $r++;
            endforeach;
        }
        ?>
    </div>
</div>

<div id="stretch-footer" class="fluid ">
    <div class="gridContainer clearfix">
        <div id="foot-left" class="fluid "><a href="<?php echo $obj->LbaseUrl(); ?>home"><img src="<?php echo $obj->LbaseUrl(); ?>images/foot-logo.png" alt="iGeek Repair" class="nobord"/></a></div>

        <div id="foot-center" class="fluid ">
            <?php echo $sqltop_support[0]->bottom_message;
            ?><br>
            <span class="banner-phone"><?php echo $sqltop_support[0]->bottom_contact_number;
            ?></span><br>
            <a href="<?php echo $sqltop[0]->facebook; ?>" target="_blank"><img src="<?php echo $obj->LbaseUrl(); ?>images/foot-fb.png" alt="iphone repair boise facebook" class="nobord"/></a>
            <a href="<?php echo $sqltop[0]->twitter; ?>" target="_blank"><img src="<?php echo $obj->LbaseUrl(); ?>images/foot-twit.png" alt="iGeek Repair twitter"/></a>
            <a href="<?php echo $sqltop[0]->instagram; ?>" target="_blank"><img class="banner-instagram" src="<?php echo $obj->LbaseUrl(); ?>images/banner-instagram-foot.png" /></a>
            <a href="mailto:<?php echo $sqltop[0]->email; ?>"><img src="<?php echo $obj->LbaseUrl(); ?>images/foot-mail.png" alt="iGeek Repair email" class="nobord"/></a>
            </div>
        <div id="footlinks1" class="fluid ">
            <?php
            $sqlfotter=$obj->FlyQuery("SELECT * FROM repair_devices_view");
            if (!empty($sqlfotter)) {
                foreach ($sqlfotter as $fotter_link):
                    ?>
                    <span class="btmnav"><a href="<?php echo $obj->LbaseUrl(); ?>repair/<?php echo $fotter_link->id; ?>/<?php echo $fotter_link->name; ?>"><?php echo $fotter_link->name; ?> Repair</a></span><br>
                    <?php
                endforeach;
            }
            ?>
        </div>
        <div id="footlinks2" class="fluid ">
            <span class="btmnav"><a href="<?php echo $obj->LbaseUrl(); ?>Find-Device">Other Devices</a></span> <br>
            <span class="btmnav"><a href="<?php echo $obj->LbaseUrl(); ?>Additional-Services">More Services</a></span> <br>
            <span class="btmnav"><a href="<?php echo $obj->LbaseUrl(); ?>AD-SE/4/Sell-Your-Item">Sell Your Device</a></span><br>
            <span class="btmnav"><a href="<?php echo $obj->LbaseUrl(); ?>Page/3/Satisfaction-Guaranteed">Satisfaction Guarantee</a></span><br>
            <span class="btmnav"><a href="<?php echo $obj->LbaseUrl(); ?>contact-us">Contact Us</a></span> </div>

    </div>
</div>

<div id="stretch-foot-bottom" class="fluid ">
    <div class="gridContainer clearfix">
        <div id="foot-copyright" class="fluid ">
            <span class="foot-copyright"> © 2016  iGeek Repair. All Rights Reserved. Site by <a href="http://www.neutrix.systems" target="_blank">Neutrix.Systems</a> </span></div>
    </div>
</div>
