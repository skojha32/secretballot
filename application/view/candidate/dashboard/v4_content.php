    <!-- Header -->
    <div class="header bg-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            </div>
          </div>
          <!-- Card stats -->
          <div class="row card text-center">
           <div class="col-md-12">
            <h2>Ongoing Elections</h2>
             <div class="table-responsive">
               <table class="table table-hover">
                 <thead>
                   <tr>
                     <th>S.no</th>
                     <th>Name</th>
                     <th>Description</th>
                     <th>Position</th>
                     <th>Started on</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
$i=1;
$ele=$call_config->get_all("SELECT * FROM tbl_election_master WHERE status='1'");
foreach ($ele as $key) {
?>
<tr>
                     <td><?= $i++; ?></td>
                     <td><?= $key['name'] ?></td>
                     <td><?= $key['description'] ?></td>
                     <td><?= $key['election_for_position'] ?></td>
                     <td><?= date("D,d M-Y",strtotime($key['con'])) ?></td>
                   </tr>
<?php
}
                   ?>
                 </tbody>
               </table>
             </div>
           </div>
           <div class="col-md-12">
            <h2 class="badge badge-success">Elections Won</h2>
             <div class="table-responsive">
               <table class="table table-hover">
                 <thead>
                   <tr>
                     <th>S.no</th>
                     <th>Name</th>
                     <th>Description</th>
                     <th>Position</th>
                     <th>Started on</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
$i=1;
$ele=$call_config->get_all("SELECT * FROM tbl_result_master WHERE winner='".$_SESSION['sess_candi_id']."'");
foreach ($ele as $win) {
$key=$call_config->get("SELECT * FROM tbl_election_master where id='".$win['election_id']."'");
?>
<tr>
                     <td><?= $i++; ?></td>
                     <td><?= $key['name'] ?></td>
                     <td><?= $key['description'] ?></td>
                     <td><?= $key['election_for_position'] ?></td>
                     <td><?= date("D,d M-Y",strtotime($key['con'])) ?></td>
                   </tr>
<?php
}
                   ?>
                 </tbody>
               </table>
             </div>
           </div>
          </div>
        </div>
      </div>
    </div>