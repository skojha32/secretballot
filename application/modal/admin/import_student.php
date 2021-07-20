<?php
include('../../../config.php');
$call_config = new config(); 
$call_config->admin_sess_checker();
$sess_data_var=$call_config->adm_sess_data_bind();
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['sbmt'])) {

    $list = '';
    include "SimpleXLSX.php";



    if ($xlsx = SimpleXLSX::parse($_FILES["file"]["tmp_name"])) {
        
        $i = 0;


        foreach ($xlsx->rows() as $elt) {
            if ($i == 0) {
                $i++;
                continue;

                
            } else {
                
                $sname = test_input($elt[1]);
                $regno = test_input($elt[2]);
                $course = test_input($elt[3]);
                $semester = test_input($elt[4]);
                $section = test_input($elt[5]);
                $phone =  test_input($elt[6]);
                $email = test_input($elt[7]);
                $password = test_input($elt[8]);
                
                $check = 0;
                
                if ($sname == "" ||  $regno == ""  || $course == "" || $semester == "" || $section == "" || $phone == "" || $email == "" || $password == "") {
                    echo "Please Enter All Fields";
                    $list .= $fname . ",";
                }
                
                elseif (is_numeric($sname) || is_numeric($section) ) {
                    echo "Name or Section is incorrect";
                    $list .= $fname . ",";
                }
                
                elseif (!is_numeric($phone) || strlen($phone) <> 10) {
                    echo "Phone Number incorrect";
                    // $list .= $fname . ",";
                }else {
                    $check = 1;
                    
                }
                if($check == 1){
                    
                    $sql =  mysqli_query($call_config->con, "INSERT INTO `tbl_students_master`( `sname`, `sreg_no`, `scourse`, `ssemester`, `ssection`, `sphone`, `username`, `password`) VALUES ('".$sname."','".$regno."','".$course."','".$semester."','".$section."','".$phone."','".$email."','".md5($password)."')");

                }
            }

            $i++;
           
        }


        if ($sql) 
        {
            $call_config->msg("Success!!","Added Successfully!!","success","admin/students/","");
        }
        else
        {
            $call_config->msg("Failed!!",mysqli_query($call_config->con,mysqli_error($call_config->con)),"error","admin/students/","");
        }
    } else {
        echo "<script type='text/javascript'>alert('Error in File or FileFormat')</script>";
        echo SimpleXLSX::parseError();
    }
}


?>