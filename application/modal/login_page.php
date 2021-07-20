<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<?php 
include('../../config.php');
$call_config = new config(); 

if(isset($_POST["submit"]))
{
	 $param1 = mysqli_escape_string($call_config->con,$_POST['_email']);
	 $password = mysqli_escape_string($call_config->con,$_POST['_password']);
	 $key = mysqli_escape_string($call_config->con,$_POST['_key']);
	if( $param1 != ''   || $param1 != null    || 
		$password != '' || $password != null  ||
		$key != ''      || $key != null       		
		)
	{
		switch($key)
		{
			case 1: // admin

				$str = "select * from tbl_admin_master where  email = '".$param1."' ";
				$res = $call_config->get($str);
				if(md5($password) == $res['password'])
				{
					// session_start();					
					$_SESSION['sess_adm_id']    = $res["id"];
					$_SESSION['sess_adm_name']  = $res["name"];
					$_SESSION['sess_adm_mobile']= $res["mobile"];
					$_SESSION['sess_adm_email'] = $res["email"];

echo '
<script src="../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
    <script>
      swal("Login Successfully..!!","your welcome..","success",{button: "waas",})
      .then((value)=>{
        window.location.href="'.$call_config->base_url().'application/view/admin/dashboard/";
      })
    </script>';

				}else{
					echo '
<script src="../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
    <script>
      swal("Login Unsuccessful..!!","your not welcome..","failed",{button: "waas",})
      .then((value)=>{
        window.location.href="'.$call_config->base_url().'application/view/candidate/dashboard/";
      })
    </script>';
					$res = $call_config->slient_session_flash();
				}
				break;				
			case 2: // candidate login code

				$str = "SELECT * FROM `tbl_candidates_master` WHERE username = '".$param1."'";
				$res = $call_config->get($str);
				if(md5($password) == $res['password'])
				{
					// session_start();					
					$_SESSION['sess_candi_id']    = $res["candidate_id"];
					$_SESSION['sess_candi_name']  = $res["candidate_name"];
					$_SESSION['sess_candi_username']= $res["username"];

echo '
<script src="../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
    <script>
      swal("Login Successfully..!!","your welcome..","success",{button: "waas",})
      .then((value)=>{
        window.location.href="'.$call_config->base_url().'application/view/candidate/dashboard/";
      })
    </script>';
					
				}else{	

					?>
					<script>alert("Invalid email or password...!")</script>
					<?php
					$res = $call_config->slient_session_flash();
				}				
				break;
			case 3: //user login code
			    $str = "SELECT * FROM `tbl_students_master` WHERE username = '".$param1."' ";
				$res = $call_config->get($str);
				if(md5($password) == $res['password'])
				{
					// session_start();					
					$_SESSION['sess_user_id']    = $res["member_id"];
					$_SESSION['sess_sname']    = $res["sname"];
					$_SESSION['sess_username']  = $res["username"];
echo '
<script src="../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
    <script>
      swal("Login Successfully..!!","your welcome..","success",{button: "waas",})
      .then((value)=>{
        window.location.href="'.$call_config->base_url().'application/view/student/dashboard/";
      })
    </script>';
					
				}else{
					echo '
<script src="../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
    <script>
      swal("Login Unsuccessful..!!","your not welcome..","failed",{button: "waas",})
      .then((value)=>{
        window.location.href="'.$call_config->base_url().'application/view/candidate/dashboard/";
      })
    </script>';
					$res = $call_config->slient_session_flash();
				}				
			break;
			default: // default
			echo '
			<script src="../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
				<script src="../../app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
				<script>
				  swal("Login Unsuccessful..!!","your not welcome..","failed",{button: "waas",})
				  .then((value)=>{
					window.location.href="'.$call_config->base_url().'application/view/candidate/dashboard/";
				  })
				</script>';
					$res = $call_config->slient_session_flash();
		}

	}else{

	}



}else{
	?><script>alert("not submited...!")window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/inc/index.php";</script><?php
}


?>
</html>