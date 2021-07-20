<?php
include('../../../config.php');
$call_config = new config(); 
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
if (isset($_POST['name'])) {
$name=mysqli_escape_string($call_config->con,$_POST['name']);
$course=mysqli_escape_string($call_config->con,$_POST['course']);
$semester=mysqli_escape_string($call_config->con,$_POST['sem']);
$section=mysqli_escape_string($call_config->con,$_POST['sec']);
$description=mysqli_escape_string($call_config->con,$_POST['description']);
$election_for_position=mysqli_escape_string($call_config->con,$_POST['election_for_position']);

#Class
	if ($name!=null && $name!=""&&$description!=null && $description!=""&&$election_for_position!=null && $election_for_position!="" && $semester!=null && $semester!="" && $section!=null && $section!="" && $course!=null && $course!="") 
	{
    	$sql="INSERT INTO `tbl_election_master`(`name`, `scourse`, `ssemester`, `ssection`, `description`, `election_for_position`) VALUES ('".$name."','".$course."','".$semester."','".$section."','".$description."','".$election_for_position."')";	
		if ($call_config->IDU($sql)) 
		{
			$call_config->msg("Success!!","Added Successfully!!","success","admin/elections/send_email.php","");
		}
		else
		{
			$call_config->msg("Failed!!",mysqli_escape_string($call_config->con,mysqli_error($call_config->con)),"error","admin/elections/","");
		}
	}

#Department
	elseif ($name!=null && $name!=""&&$description!=null && $description!="" &&$election_for_position!=null && $election_for_position!="" && $course!=null && $course!="") 
	{
    	$sql="INSERT INTO `tbl_election_master`(`name`, `scourse`, `description`, `election_for_position`) VALUES ('".$name."','".$course."','".$description."','".$election_for_position."')";	
		if ($call_config->IDU($sql)) 
		{
			$call_config->msg("Success!!","Added Successfully!!","success","admin/elections/send_email.php","");
		}
		else
		{
			$call_config->msg("Failed!!",mysqli_escape_string($call_config->con,mysqli_error($call_config->con)),"error","admin/elections/","");
		}
	}
#Semester
	elseif ($name!=null && $name!=""&&$description!=null && $description!="" &&$election_for_position!=null && $election_for_position!="" && $semester!=null && $semester!="") 
	{
    	$sql="INSERT INTO `tbl_election_master`(`name`, `ssemester`, `description`, `election_for_position`) VALUES ('".$name."','".$course."','".$description."','".$election_for_position."')";	
		if ($call_config->IDU($sql)) 
		{
			$call_config->msg("Success!!","Added Successfully!!","success","admin/elections/send_email.php","");
		}
		else
		{
			$call_config->msg("Failed!!",mysqli_escape_string($call_config->con,mysqli_error($call_config->con)),"error","admin/elections/","");
		}
	}
#Global
	elseif ($name!=null && $name!=""&&$description!=null && $description!=""&&$election_for_position!=null && $election_for_position!="") 
	{
		$sql="INSERT INTO `tbl_election_master`(`name`, `description`, `election_for_position`) VALUES ('".$name."','".$description."','".$election_for_position."')";	
		if ($call_config->IDU($sql)) 
		{
			$call_config->msg("Success!!","Added Successfully!!","success","admin/elections/send_email.php","");
		}
		else
		{
			$call_config->msg("Failed!!",mysqli_escape_string($call_config->con,mysqli_error($call_config->con)),"error","admin/elections/","");
		}
	}
	else
	{
		$call_config->msg("Failed!!","Form Validation Failed","error","admin/elections/","");		
	}
}
else
{
	$call_config->msg("Failed!!","Invalid action","error","","");	
}

?>