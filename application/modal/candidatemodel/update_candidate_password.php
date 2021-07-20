	<?php 
include('../../../config.php');
$call_config = new config();
 $call_config->cand_sess_checker();
 $sess_data_var=$call_config->cand_sess_data_bind();
?>
<?php
if(isset($_POST["submit"]))
{
	  $oldpassword = mysqli_escape_string($call_config->con,$_POST['oldpassword']);
	  $newpassword = mysqli_escape_string($call_config->con,$_POST['newpassword']);
	  $repassword = mysqli_escape_string($call_config->con,$_POST['repassword']);
	  $session = $_SESSION["sess_candi_id"];
	if($newpassword == $repassword)
	{
		if ($oldpassword==$newpassword) {
$call_config->msg("Failed!!","Old and New Password are Same!!","error","candidate/edit_password/","");	

		}
				$str = "SELECT `password` FROM `tbl_candidates_master` WHERE `candidate_id`='".$session."' ";
				$res = $call_config->get($str);
				if(md5($oldpassword) == $res['password'])
				{		
$update = "UPDATE `tbl_candidates_master` SET `password`='".md5($newpassword)."' WHERE `candidate_id`='".$session."'";	
					if($call_config->IDU($update))
					{
$call_config->msg("Success!!","Password Updated Successfully.","success","candidate/edit_password/","");
					}
					else
					{
$call_config->msg("Failed!!","Updated Failed.","error","candidate/edit_password/","");	
					}			
				}
				else{
$call_config->msg("Failed!!","Old Password did not matched!!","error","candidate/edit_password/","");	
				}				
		}
		else{
$call_config->msg("Failed!!","Re-Enter Password match Failed!!","error","candidate/edit_password/","");	
		}



}

?>