<ul>
    <li class='active'><a href='<?php echo $obj->LbaseUrl(); ?>home'><span>Home</span></a>
        <ul>
            <li class='active'><a href='<?php echo $obj->LbaseUrl(); ?>About-us'><span>About Us</span></a></li>
            <?php
            $sqlstores=$obj->FlyQuery("SELECT * FROM contact_location");
            if (!empty($sqlstores)) {
                foreach ($sqlstores as $store):
                    ?>
                    <li class='active'>
                        <a href='<?php echo $obj->LbaseUrl(); ?>store/<?php echo $store->id; ?>/<?php echo $store->name; ?>'><span><?php echo $store->name; ?></span></a>
                    </li>
                    <?php
                endforeach;
            }
            ?>
            <li class='active'><a href='<?php echo $obj->LbaseUrl(); ?>contact-us'><span>Contact Us</span></a></li>
        </ul>
    </li>
<!--    <li class='active'><a href='boise-iphone-repair.php'><span>iPhone</span></a>
        <ul>
            <li><a href="iphone-repair-3.php">iPhone 3G/3Gs Repair</a></li>
            <li><a href="iphone-repair-4.php">iPhone 4/4s Repair</a></li>
            <li><a href="iphone-repair-5.php">iPhone 5 Repair</a></li>
            <li><a href="iphone-repair-5s.php">iPhone 5S Repair</a></li>
            <li><a href="iphone-repair-5c.php">iPhone 5C Repair</a></li>
            <li><a href="iphone-repair-6.php">iPhone 6 Repair</a></li>
            <li><a href="iphone-repair-6plus.php">iPhone 6 Plus Repair</a></li>
            <li><a href="boise-iphone-repair-color.php">iPhone Color Change</a></li>
        </ul>
    </li>
    <li class='active'><a href='boise-ipad-repair.php'><span>iPad</span></a>
        <ul>
            <li><a href="ipad-repair-1.php">ipad - 1st Generation</a></li>
            <li><a href="ipad-repair-2.php">ipad - 2nd Generation</a></li>
            <li><a href="ipad-repair-3.php">ipad - 3rd Generation</a></li>
            <li><a href="ipad-repair-4.php">ipad - 4th Generation</a></li>
            <li><a href="ipad-repair-air.php">ipad - Air</a></li>
            <li><a href="boise-ipad-repair-mini.php">ipad Mini</a></li>
        </ul>
    </li>
    <li><a href="boise-ipod-repair.php">iPod</a></li>
    <li><a href="boise-imac-repair.php">iMac</a></li>
    <li class='active'><a href='boise-macbook-repair.php'><span>Macbook</span></a></li>
    <li class='active'><a href='find-device-other.php'><span>Other Devices</span></a>
        <ul>
            <li><a href="other-devices-samsung.php">Samsung</a></li>
            <li><a href="other-devices-HTC.php">HTC</a></li>
            <li><a href="other-devices-lg.php">LG</a></li>
            <li><a href="other-devices-motorola.php">Motorola</a></li>
        </ul>

    </li>
    <li><a href="console.php">Console Repair</a>
        <ul>
            <li><a href="console-playstation.php">PlayStation Repair</a></li>
            <li><a href="console-xbox.php">Xbox Repair</a></li>
            <li><a href="console-nintendo.php">Nintendo Repair</a></li>
        </ul>
    </li>-->
    <!--dynamic menu start from here-->
    <?php
    $sqldm=$obj->FlyQuery("SELECT id,name FROM repair_devices");
    if (!empty($sqldm)) {
        foreach ($sqldm as $dm):
            ?>
            <li><a href="<?php echo $obj->LbaseUrl(); ?>repair/<?php echo $dm->id; ?>/<?php echo $dm->name; ?>"><?php echo $dm->name; ?></a>
                <?php
                $sqlsdm=$obj->FlyQuery("SELECT id,name,repair_device FROM repair_device_version WHERE repair_device='" . $dm->id . "'");
                if (!empty($sqlsdm)) {
                    ?>
                    <ul>
                        <?php
                        foreach ($sqlsdm as $sdm):
                            ?>
                            <li><a href="<?php echo $obj->LbaseUrl(); ?>device-repair/<?php echo $sdm->id; ?>/<?php echo str_replace(" ", "-", $sdm->name); ?>"><?php echo $sdm->name; ?></a></li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </li>
            <?php
        endforeach;
    }
    ?>
    <!--dynamic menu end from here-->
    <li class='active'><a href='<?php echo $obj->LbaseUrl(); ?>Additional-Services'><span>More Services</span></a>
        <ul>
            <?php
            $sqladse=$obj->FlyQuery("SELECT id,title FROM additional_services_offered_view");
            if (!empty($sqladse)) {
                foreach ($sqladse as $adse):
                    ?>
                    <li><a href="<?php echo $obj->LbaseUrl(); ?>AD-SE/<?php echo $adse->id; ?>/<?php echo str_replace("%","",$obj->CleanStringDashUrl($adse->title)); ?>"><?php echo $adse->title; ?></a></li>
                    <?php
                endforeach;
            }
            ?>
        </ul>
    </li>
</ul>


