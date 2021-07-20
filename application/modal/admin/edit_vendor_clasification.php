<?php
include('../../../config.php');
$call_config = new config(); 

if(isset($_POST["submit"]))
{
	$id= $_POST['id'];
	$name= $_POST['name'];
	$session= $_POST['session'];
	if( $name != ''   || $name != null )
	{
			$sql = "UPDATE `tbl_vendor_classification_master` SET `name`='".$name."',`u_by`='".$session."' WHERE `id`='".$id."' ";
	if ($call_config->IDU($sql)) {
		$call_config->msg("Updated Successfully!!","a row has been update","success","admin/","vendor_classification");
	}
	else
	{
	$call_config->msg("Failed!!","a row has been update","warning","admin/","vendor_classification");	
	}
}
else
	{
	$call_config->msg("Failed!!","Invalid action","error","","vendor_classification");	
	}
}
?>