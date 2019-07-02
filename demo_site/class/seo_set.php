<?php
$sqlseo=$obj->FlyQuery("SELECT * FROM seo_setting LIMIT 1");
if (!empty($sqlseo)) {
    $site_title=$sqlseo[0]->site_title;
    $site_keyword=$sqlseo[0]->site_keywords;
    $site_description=$sqlseo[0]->site_description;
    $site_author=$sqlseo[0]->site_author;
    $favicon=$obj->LbaseUrl() . "cms-admin/upload/" . $sqlseo[0]->site_favicon;
}else {
    $site_title='images/favicon.ico';
    $site_keyword='Wireless,Igeek';
    $site_description='Contact your iGeek Repair company today to receive professional and affordable care for your iphone, ipod, ipad or Macbook computer.';
    $site_author='Md Mahamodur Zaman Bhuyian Fahad-AMSIT';
    $favicon='images/favicon.ico';
}
?>
<title><?php echo $page_title; ?> | <?php echo $site_title; ?></title>
<link rel="icon" href="<?php echo $favicon; ?>" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="keywords" content="<?php echo $site_keyword; ?>" />
<meta name="author" content="<?php echo $site_author; ?>" />
<meta name="robots" content="all" />
<meta name="googlebot" content="all" />
<meta name="googlebot-news" content="all" />