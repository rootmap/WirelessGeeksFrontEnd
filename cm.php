<?php

include './class/db_Class.php';
$table="site_contact_us";
//print_r($_POST);
extract($_POST);
if (!empty($name) && !empty($email) && !empty($phone) && !empty($mobile_phone) && !empty($how_did_he_or_she_hear_about_us) && !empty($questions__comments)) {
    $insert=array('name'=>$name, 'email'=>$email, 'phone'=>$phone, 'mobile'=>$mobile_phone, 'how_did_he_or_she_hear_about_us'=>$how_did_he_or_she_hear_about_us, 'questions__comments'=>$questions__comments, 'date'=>date('Y-m-d'), 'status'=>1);
    if ($obj->insert($table, $insert) == 1) {
        $msg="Contact Info Successfully Send.";
        $sqlgetemail=$obj->FlyQuery("SELECT email FROM message_and_social_link ORDER BY id DESC LIMIT 1");
        if (!empty($sqlgetemail)) {
            $supportem=$sqlgetemail[0]->email;
            $getnn=explode("@", $supportem);
            $getname=$getnn[0];
        }else {
            $supportem="justindabish@gmail.com";
            $getnn=explode("@", $supportem);
            $getname=$getnn[0];
        }
        include './email/mail_helper_functions.php';
        if (sendEmailFunction($email, $name, "test@skeletonit.com", $questions__comments, $questions__comments) == true) {
            if (sendEmailFunction($supportem, $getname, "test@skeletonit.com", $questions__comments, $questions__comments) == true) {
                $obj->Success($msg, $obj->LbaseUrl() . "contact-us");
            }else {
                $err="Failed, Please Try Again.";
                $obj->Error($err, $obj->LbaseUrl() . "contact-us");
            }
        }else {
            $err="Failed, Please Try Again.";
            $obj->Error($err, $obj->LbaseUrl() . "contact-us");
        }
    }else {
        $err="Failed, Please Try Again.";
        $obj->Error($err, $obj->LbaseUrl() . "contact-us");
    }
}else {
    $err="Some Field is Empty.";
    $obj->Error($err, $obj->LbaseUrl() . "contact-us");
}
exit();
?>
