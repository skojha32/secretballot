<?php
 include("../../../../config.php");
 $call_config = new config();
 $call_config->cand_sess_checker();
 $sess_data_var=$call_config->cand_sess_data_bind();
   $result=$call_config->get("SELECT * FROM `tbl_admin_master` WHERE `id`='".$sess_data_var['sess_cand_id']."'");

 include('../../../../public/candidate/v1_HeadPart.php');
 include('../../../../public/candidate/v2_sidebar.php');
 include('../../../../public/candidate/v3_TopNavBar.php');
include('v4_content.php');
include('../../../../public/candidate/v5_Footer.php');

?>