<?php
 include("../../../../config.php");
 $call_config = new config();
 $call_config->user_sess_checker();
 $sess_data_var=$call_config->user_sess_data_bind();
 $result=$call_config->get("SELECT * FROM `tbl_students_master` WHERE `member_id`='".$sess_data_var['sess_user_id']."'");

 include('../../../../public/student/v1_HeadPart.php');
 include('../../../../public/student/v2_sidebar.php');
 include('../../../../public/student/v3_TopNavBar.php');
 ?>
    <!-- Header -->
    <div class="header bg-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"></h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
          <form class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url()."application/modal/studentmodel/update_student_password.php"; ?>" novalidate>
                            <div class="form-body">
                                <h4 class="form-section mt-2 ml-3"><i class="ft-lock"></i> Change Password</h4>
                                <div class="form-group row mt-5">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip01">Old Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" id="validationTooltip01" class="form-control" placeholder="Old Password" name="oldpassword" required>
                                       
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip02">New Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" id="validationTooltip02" class="form-control Password" placeholder="New Password" name="newpassword" required>
                                       
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip03">Re-New Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" id="validationTooltip03" class="form-control Re-Password" placeholder="Re-Password" name="repassword" required="">
                                       
                                    </div>
                                    </div>
                                </div>
<div class="mb-5 text-center">
                                <button type="button" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary" name="submit">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
</div>
                            </div>
                        </form>
                <!--/ form end -->
          </div>
        </div>
       
      </div>
 
<!-- BEGIN: Page JS-->
    <script src="<?php echo $admin_base_url ?>app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->

<script>
    $(document).ready(function(){
        $('#msg').hide();
    $(".Re-Password").keyup(function(){
        if($(".Re-Password").val() != $(".Password").val())
        {
            $('#msg').show();
            // alert('j');
            // $("#validationTooltip03").val('')
        }
        else{
            $('#msg').hide();
        }
    })
});
</script>
 <?php
include('../../../../public/student/v5_Footer.php');

?>