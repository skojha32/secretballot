<?php 
session_start(); 
class config{

	 public  $localhost = "localhost";
      public  $user = "root";
	  public  $password = "";
	  public  $dbname = "onlinevotingsystem";
	  public  $con;

	public function config()
	{
	   
	    //error_reporting(0);	
	    date_default_timezone_set('Asia/Kolkata');
	   $this->con =  mysqli_connect($this->localhost,$this->user,$this->password,$this->dbname); 
	   if($this->con != true)
		{
			echo "Database is not connected.";	
			exit();	
		}
	}
	public function base_url()
	{ 
		
		$set_base_url = "/votingsystem/";                                           // set base url....
		$server_host = "https://".$_SERVER['HTTP_HOST']."";
		$final_base_url =  $server_host.$set_base_url;
		return $final_base_url;
	}
		public function adm_base_url()
	{ 
		
		$set_base_url = "/votingsystem/application/view/admin/";                                           // set base url....
		$server_host = "https://".$_SERVER['HTTP_HOST']."";
		$final_base_url =  $server_host.$set_base_url;
		return $final_base_url;
	}
	// alert type== success,error,warning,info,question
public function msg($alert,$msg,$type,$path,$path2)
{
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-image: url('<?= $this->base_url() ?>app-assets/images/voting.jpg');background-size: cover;background-repeat: no-repeat;background-blend-mode: all;height: 100vh;">
	<script src='<?php echo $this->base_url() ?>app-assets/vendors/js/vendors.min.js' type='text/javascript'></script>
	<script src='<?php echo $this->base_url() ?>app-assets/vendors/js/extensions/sweetalert2.all.js' type='text/javascript'></script>
	<script>
	swal('<?= $alert;?>','<?= $msg;?>','<?= $type;?>',{button: 'Okay',})
       .then((value)=>{
         window.location='<?= $this->base_url(); ?>application/view/<?= $path.$path2;?>';
       })
    </script>
</body>
</html>
    <?php 

}
 public function session_flash() 
 { 
    
 	session_destroy();
 	?>
 	<script>alert('Access Denied.d...!');
 	window.location = "<?php echo $this->base_url(); ?>index.html";
 	</script>
 	<?php
 }

 public function slient_session_flash()
 {
 	
 	session_destroy();
 	?><script>
 		window.location = "<?php echo $this->base_url(); ?>index.html";
 	</script>
 	<?php
 }
 

//============================================ SESSION CHECKER ===================================================================//
 //=> for admin
 public function adm_sess_data_bind()
 {
		// session_start(); 
			$sess_admin = array(
				        'sess_adm_id' =>$_SESSION['sess_adm_id'] ,
				        'sess_adm_name'=>$_SESSION['sess_adm_name'],
				        'sess_adm_mobile'=>$_SESSION['sess_adm_mobile']
			            );
			return $sess_admin;
				
 }
 public function admin_sess_checker()
 {
 	// session_start(); 
 	if($_SESSION['sess_adm_id'] != '' || $_SESSION['sess_adm_id'] != null)
 	{
 		$sql = "select * from tbl_admin_master where id = '".$_SESSION['sess_adm_id']."' ";
 		$res = $this->get($sql);
 		if($res['name'] != $_SESSION['sess_adm_name'] || $res['mobile'] != $_SESSION['sess_adm_mobile'])
 		{
 		   $this->session_flash();
 		   die;
 		}
 	}else{
 		$this->session_flash();
 		die;
 	}
 //	return true;;
 }

//=>for candidate
  public function cand_sess_data_bind()
 {
		// session_start();

			$sess_cand = array(
				        'sess_cand_id' =>$_SESSION['sess_candi_id'] ,
				        'sess_cand_name'=>$_SESSION['sess_candi_name'],
				        'sess_cand_username'=>$_SESSION['sess_candi_username'] 
			            );
			return $sess_cand;
				
 }
 public function cand_sess_checker()
 {
 	// session_start(); 
 	if($_SESSION['sess_candi_id'] != '' || $_SESSION['sess_candi_id'] != null)
 	{
 		$sql = "SELECT * FROM `tbl_candidates_master` where candidate_id = '".$_SESSION['sess_candi_id']."' ";
 		$res = $this->get($sql);
 		if($res['username'] != $_SESSION['sess_candi_username'])
 		{
 		   $this->session_flash();
 		   die;
 		}
 	}else{
 		$this->session_flash();
 		die;
 	}
 }
 //=>for students
 public function user_sess_data_bind()
 {
		// session_start(); 
			$sess_acc = array(
				        'sess_user_id' =>$_SESSION['sess_user_id'] ,
				        'sess_user_name'=>$_SESSION['sess_sname'],
				        'sess_user_username'=>$_SESSION['sess_username']
			            );
			return $sess_acc;
				
 }
 public function user_sess_checker()
 {
 	// session_start(); 
 	if($_SESSION['sess_user_id'] != '' || $_SESSION['sess_user_id'] != null)
 	{
 		$sql = "SELECT * FROM `tbl_students_master` where member_id = '".$_SESSION['sess_user_id']."' ";
 		$res = $this->get($sql);
 		if($res['username'] != $_SESSION['sess_username'])
 		{
 		   $this->session_flash();
 		   die;
 		}
 	}else{
 		$this->session_flash();
 		die;
 	}
 }
 

 //IDU
 public function IDU($sql)
 {
 	try{
 		if($sql != null || $sql != '')
 		{
 			  $res = mysqli_query($this->con,$sql);
 			  if($res)
 			  {
 			  	 $y =  mysqli_affected_rows($this->con);
 			  	 if($y > 0)
 			  	 {
 			  	 	return true;
 			  	 }else{
 			  	 	return false;
 			  	 }
 			  }else{
 			  	 	return false;
 			  }
 		}else{
 			return false;;
 		}

 	}catch(exception $e){
 		return false;
 	}
 }

 //insert
 public function insert($tbl_name,$data=array())
 {
 	try{
	  if(count($data) > 0)
	  {
 		$str1 = "insert into ".$tbl_name;$str2 = "(";$str3 = '';$str4 =  ")";$str5 = " values";$str6 = " (";$str7 = '';$str8 =  ")";
 		 $k = '';
 		 $v = '';
 		 $i=0;
 		 foreach ($data as $key)
 		 {
 		   if($i == count($data)-1){
	              $k.= array_keys($data,$key)[0];
	 		 	  $v.= "'".$key."'";
 		 	}else{
	              $k.= array_keys($data,$key)[0].", ";
	 		 	  $v.= "'".$key."', ";
 		 	}
 		 	$i++; 		
 		 }
 	     $sql = $str1.$str2.$k.$str4.$str5.$str6.$v.$str8;
 		if($sql != '')
 		{
 		  $res = mysqli_query($this->con,$sql);
 		  if($res)
 		  {
 		  	 return mysqli_affected_rows($this->con);
 		  	}else{
 		  	 return 0;
 		  	}
 		 
 		}	
	 }	
 	}catch(exception $e){
 		return 0;
 	}
 }


 //Get one
 public function get($sql)
 {
 	try{
		$x = mysqli_query($this->con,$sql);
		if($x)
		{
           return mysqli_fetch_assoc($x);
		}else{
			return array();
		}
 	}catch(exception $e){
 		return array();
 	}
 }

// public function send_sms($mobile,$mess)
// {
//         $no = urlencode('+91'.$mobile);
//     $mess = rawurlencode($mess);
//       // Send the GET request with cURL
//     $ch = curl_init('http://sms.xolohost.com/submitsms.jsp?user=pvtest&key=dgaasvafa&mobile='.$no.'&message='.$mess.'&senderid=PVTEST&accusage=1');
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $response = curl_exec($ch);
//     curl_close($ch);

// }
//code to send message ends here
//Get all using sql query    ----- return an array(2D) use foreach
 public function get_all($sql)
 {
 	try{
 		//$result[];
 		$x = mysqli_query($this->con,$sql);
 	    $result=mysqli_fetch_all($x, MYSQLI_ASSOC);
 	    // do
 	    // {
 	    // 	$result[]=mysqli_fetch_assoc($x);
 	    // }while(mysqli_fetch_assoc($x));
           
          return $result;
 	}
 	catch(exception $e){
 		return $e;
 	}
 }

}

//$call_config= new config();
//print_r($call_config->get_all("SELECT * FROM `tbl_admin_master`"));
//$result=$call_config->get_all("SELECT * FROM `tbl_accountant_manager_master`");
//print_r($result);
//foreach ($result as $key) {
//	echo $key["id"];
//}
//echo  $referal_res=$call_config->referal_function_master('ASDHIK','1000');
//print_r($referal_res);
 //echo $a = $call_config->base_url();
//echo $call_config->create_referal_code();
//print_r($call_config->get_refered_by_detalis('ASDHIK'));
?>

