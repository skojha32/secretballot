<?php
include('../../../config.php');
$call_config = new config(); 
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
if (isset($_GET['id'])) {
$id=mysqli_escape_string($call_config->con,$_GET['id']);
	if ($id!=null && $id!="") 
	{
    $sql="DELETE FROM `tbl_students_master` WHERE member_id='".$id."'";	
	if ($call_config->IDU($sql)) 
	{
$call_config->msg("Success!!","Deleted Successfully!!","success","admin/students/","");
	}
	else
	{
$call_config->msg("Failed!!",mysqli_escape_string($call_config->con,mysqli_error($call_config->con)),"error","admin/students/","");
	}
	}
	else
	{
$call_config->msg("Failed!!","Form Validation Failed","error","admin/students/","");		
	}
}
else
{
	$call_config->msg("Failed!!","Invalid action","error","","");	
}

?>