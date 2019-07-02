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
<title>About iGeek Repair | iGeek Repair Specialists in Idaho</title>
<meta name="description" content="iGeek Repair is the leading iGeek Repair service offering repairs for iphones, ipads, ipod, macbook and imac computers." />
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

<div id="main-body-sub" class="fluid ">
	<div class="gridContainer clearfix">
    	<div id="main-content-sub" class="fluid ">
          <img alt="" src="images/about-idaho-repair.jpg" />
<h1>About Us</h1>

<p>iGeek Repair&nbsp;is locally owned and operated in by Chad Hartley, Mitch Parker,&nbsp;Kalvin Bunn and Chandler Webb. iGeek Repair is comprised of knowledgeable mobile electronics&nbsp;technicians that are ready to service all Apple products including iPhones, iPads, iPods, Macbook Pros, iMacs and more. We also service all major brands of cell phones, laptops, computers, tablets and MP3 players including Samsung, HTC, Motorola, Nokia and LG.&nbsp;<br />
<br />
All of our work is 100% guaranteed and backed by our 90 day warranty. Our customers love coming in to see us for their repairs, as most of them can be performed under 1 hour. We keep&nbsp;almost every Apple part in stock and ready to go for same day service!</p>

<p style="text-align: center;"><a href="http://www.idahoiphones.com/contact.php" style="line-height: 32.400001525878906px; text-align: justify;">CONTACT US BY SENDING US AN EMAIL or CALL US at 248.834.3357 for the LOWEST PRICES!</a><br />
<span style="font-size:36px;"><a href="locations.php">Come find the closest store&nbsp;near you!</a></span></p>
        </div>

	</div>
</div>

<?php include('./class/footer.php'); ?>
<!-- start number replacer -->
<script type="text/javascript"><!--
vs_account_id      = "CtjSZlSRzqpdKwB4";
//--></script>
<script type="text/javascript" src="//adtrack.voicestar.com/euinc/number-changer.js">
</script>
<!-- end ad widget -->
</body>

</html>
