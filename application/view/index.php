<?php
include('../../config.php');
$call_config = new config();
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Your Account</title>
  <link rel="icon" href="<?= $call_config->base_url();?>app-assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= $call_config->base_url();?>app-assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?= $call_config->base_url();?>app-assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= $call_config->base_url();?>app-assets/css/argon.min5438.css?v=1.2.0" type="text/css">
</head>

<body style="background-image: url('<?= $call_config->base_url() ?>app-assets/images/voterreg.jpg');background-size: cover;background-repeat: no-repeat;background-blend-mode: all;height: 100vh;">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Page content -->
    <div class="container">
      <div class="row mt-5">
        <div class="col-lg-8 col-md-6">
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0">
            <div class="card-header bg-transparent">
              <div class="text-muted text-center mt-2 "><small class="badge badge-info">Please Login To Continue</small></div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/login_page.php">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" type="text" name="_email" value="test@gmail.com">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" name="_password" type="password">
                  </div>
                </div>
                <div class="form-group">
                <div class="text-muted text-center mt-2 mb-2"><small>Login As</small></div>
                    <select class="form-control" name="_key">
                    <option value="1">Admin</option>
                    <option value="2">Candidate</option>
                    <option value="3">Students</option>
                    </select>
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">Log in!!</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


<!-- Mirrored from demos.creative-tim.com/argon-dashboard-pro/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Apr 2020 09:30:30 GMT -->
</html>