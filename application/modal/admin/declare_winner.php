<?php
include('../../../config.php');
$call_config = new config(); 
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
if (isset($_GET['id'])) {
$id=mysqli_escape_string($call_config->con,$_GET['id']);
	if ($id!=null && $id!="") 
	{
$ele=$call_config->get("SELECT * FROM tbl_election_master where id='".$id."'");
$candidates=$call_config->get_all("SELECT * FROM tbl_candidates_master");
$res=array('candid'=>0,'votes'=>0);
foreach ($candidates as $cand) {
	$votes=$call_config->get("SELECT COUNT(*) as total FROM tbl_votes_master where candidate_id='".$cand['candidate_id']."' AND election_id='".$ele['id']."'");
	if ($res['votes']<$votes['total']) {
	$res['votes']=$votes['total'];
	$res['candid']=$cand['candidate_id'];
	}
	}	
	if ($res['votes']>0) 
	{
$winner=$call_config->get("SELECT * FROM tbl_candidates_master WHERE candidate_id='".$res['candid']."'");
$call_config->IDU("INSERT INTO `tbl_result_master`(`election_id`, `winner`, `winnername`) VALUES ('".$ele['id']."','".$winner['candidate_id']."','".$winner['candidate_name']."')");
$call_config->msg("Winner Declare!!","Winner is : ".$winner['candidate_name'],"success","admin/elections/","");
	}
	else
	{
$call_config->msg("Failed!!",mysqli_escape_string($call_config->con,"No votes till now Can't declair winner!!"),"error","admin/elections/","");
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