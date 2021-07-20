	<?php 
include('../../../config.php');
$call_config = new config();
 $call_config->user_sess_data_bind();
 $sess_data_var=$call_config->user_sess_data_bind();
 if($_GET['candidate_id'] && $_GET['election_id']){
 $candidate_id=mysqli_escape_string($call_config->con,$_GET['candidate_id']);
 $election_id=mysqli_escape_string($call_config->con,$_GET['election_id']);
if ($candidate_id!=null && $candidate_id!=""&&$election_id!=null && $election_id!="") 
	{
    $sql="INSERT INTO `tbl_votes_master`(`voter_id`, `candidate_id`, `election_id`) VALUES ('".$sess_data_var['sess_user_id']."','".$candidate_id."','".$election_id."')";	
	if ($call_config->IDU($sql)) 
	{
$call_config->msg("Success!!","Added Successfully!!","success","student/recent_elections/send_email.php","");
	}
	else
	{
$call_config->msg("Failed!!",mysqli_escape_string($call_config->con,mysqli_error($call_config->con)),"error","student/recent_elections/","");
	}
	}
	else
	{
$call_config->msg("Failed!!","Form Validation Failed","error","student/recent_elections/","");		
	}
}
else
{
	$call_config->msg("Failed!!","Invalid action","error","","");	
}
?>