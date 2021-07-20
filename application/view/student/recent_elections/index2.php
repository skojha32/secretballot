<?php
 include("../../../../config.php");
 $call_config = new config();
 $call_config->user_sess_checker();
 $sess_data_var=$call_config->user_sess_data_bind();
 $get_id=$_GET['id'];
   $result=$call_config->get("SELECT * FROM `tbl_students_master` WHERE `member_id`='".$sess_data_var['sess_user_id']."'");
  include('../../../../public/student/v1_HeadPart.php');
 include('../../../../public/student/v2_sidebar.php');
 include('../../../../public/student/v3_TopNavBar.php');
include('v4_content2.php');
 include('../../../../public/student/v5_Footer.php');
 ?>