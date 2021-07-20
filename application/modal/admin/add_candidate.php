<?php
include('../../../config.php');
$call_config = new config(); 
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
if (isset($_POST['cname'])) {
$cname=mysqli_escape_string($call_config->con,$_POST['cname']);
$username=mysqli_escape_string($call_config->con,$_POST['username']);
$password=mysqli_escape_string($call_config->con,$_POST['password']);
$id=mysqli_escape_string($call_config->con,$_POST['id']);
	if ($cname!=null && $cname!=""&&$password!=null && $password!=""&&$username!=null && $username!="" &&$id!=null && $id!="") 
	{
    $sql="INSERT INTO `tbl_candidates_master`(`candidate_name`, `username`, `password`, `id`) VALUES ('".$cname."','".$username."','".md5($password)."', '".$id."')";	
	if ($call_config->IDU($sql)) 
	{
$call_config->msg("Success!!","Added Successfully!!","success","admin/candidates/","");
	}
	else
	{
$call_config->msg("Failed!!",mysqli_escape_string($call_config->con,mysqli_error($call_config->con)),"error","admin/students/","");
	}
	}
	else
	{
$call_config->msg("Failed!!","Form Validation Failed","error","admin/candidates/","");		
	}
}
else
{
	$call_config->msg("Failed!!","Invalid action","error","","");	
}

?>