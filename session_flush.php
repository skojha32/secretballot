<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
include("config.php");
$call_config = new config();  
 	session_destroy();
 echo '
<script src="'.$call_config->base_url().'app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="'.$call_config->base_url().'app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
    <script>
      swal("Successfull!!","Logout successfull!!","success",{button: "Okay",})
      .then((value)=>{
        window.location.href="'.$call_config->base_url().'";
      })
    </script>';
?>
</body>
</html>