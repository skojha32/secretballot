    <!-- Header -->
    <div class="header bg-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Students</h5>
                      <?php
$sql="SELECT COUNT(*) as sum FROM `tbl_students_master`";
$res=$call_config->get($sql);
                       ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $res['sum']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap"><a href="<?php echo $call_config->base_url() ?>application/view/admin/vendors/">View all</a></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Active Election</h5>
                       <?php
$sql="SELECT COUNT(*) as sum FROM `tbl_election_master` WHERE `status`='1'";
$res=$call_config->get($sql);
                       ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $res['sum']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap">View all</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Candidates</h5>
                      <?php
$sql="SELECT COUNT(*) as sum FROM `tbl_candidates_master`";
$res=$call_config->get($sql);
                       ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $res['sum']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap">View all</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Votes</h5>
 <?php
$sql="SELECT COUNT(*) as sum FROM `tbl_votes_master`";
$res=$call_config->get($sql);
                       ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $res['sum']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap">View all</span>
                  </p>
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
      <div class="row" style="background-image: url('<?= $call_config->base_url() ?>app-assets/images/bg.jpeg');background-size: cover;background-repeat: no-repeat;background-blend-mode: all;">
        <div class="col-xl-7">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Recent Elections(<?php echo date("M-Y"); ?>)</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo $call_config->base_url(); ?>application/view/admin/elections/" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Election For Position</th>
                    <th scope="col">status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                 $month=date("Y-m");
$sql="SELECT * FROM `tbl_election_master` where `con` LIKE '%".$month."%'";
$result=$call_config->get_all($sql);
      foreach ($result as $key) {
echo "<tr><th scope='row'>".$key['name']."</th><td>".$key['description']."</td><td>".$key['election_for_position']."</td><td>";
if ($key['status']=="1") {
  echo '<i class="fas fa-arrow-up text-success mr-3"></i> registered';
}
else{
echo '                      <i class="fas fa-arrow-down text-warning mr-3"></i> pending';
}
                      
echo       "</td></tr>";
      }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-5">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Election Results</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo $call_config->base_url(); ?>application/view/admin/election_results/" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Election Name</th>
                    <th scope="col">Winner Candidate</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                 $month=date("Y-m");
$sql="SELECT a.*,b.name FROM `tbl_result_master` AS a JOIN tbl_election_master AS b ON a.election_id=b.id where a.`con` LIKE '%".$month."%'";
$result=$call_config->get_all($sql);
      foreach ($result as $key) {
echo "<tr><th scope='row'>".$key['winner']."</th><td>".$key['con']."</td><td><span class='btn btn-sm btn-success'>active</span></td></tr>";
      }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>