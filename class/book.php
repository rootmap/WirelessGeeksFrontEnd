<?php
$sqlbook=array();
$sqlbook=$obj->FlyQuery("SELECT * FROM order_contact_detail ORDER BY id DESC LIMIT 1");
?>
<div id="right-content" class="fluid ">
    <a href="<?php echo $sqlbook[0]->order_link; ?>" target="_blank"><img src="<?php echo $obj->baseUrl(); ?>upload/<?php echo $sqlbook[0]->order_photo_add; ?>" alt="book iphone appointment boise" class="nobord"/></a> <br><br>
    <span class="body-green">or by phone:</span><br>
<span class="body-phone"><?php echo $sqlbook[0]->phone_number; ?></span>
    <br><br>
    <span class="body-green"><?php echo $sqlbook[0]->moto_text; ?></span> </div>