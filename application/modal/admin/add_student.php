<?php
include('../../../config.php');
$call_config = new config(); 
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
if (isset($_POST['sname'])) {
$sname=mysqli_escape_string($call_config->con,$_POST['sname']);
$regno=mysqli_escape_string($call_config->con,$_POST['regno']);
$course=mysqli_escape_string($call_config->con,$_POST['course']);
$semester=mysqli_escape_string($call_config->con,$_POST['semester']);
$section=mysqli_escape_string($call_config->con,$_POST['section']);
$phone=mysqli_escape_string($call_config->con,$_POST['phone']);
$email=mysqli_escape_string($call_config->con,$_POST['email']);
$password=mysqli_escape_string($call_config->con,$_POST['password']);
	if ($sname!=null && $sname!=""&&$password!=null && $password!=""&&$email!=null && $email!="") 
	{
    $sql="INSERT INTO `tbl_students_master`(`sname`, `sreg_no`, `scourse`, `ssemester`, `ssection`, `sphone`, `username`, `password`) VALUES ('".$sname."','".$regno."','".$course."','".$semester."','".$section."','".$phone."','".$email."','".md5($password)."')";	
	if ($call_config->IDU($sql)) 
	{
$call_config->msg("Success!!","Added Successfully!!","success","admin/students/","");
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