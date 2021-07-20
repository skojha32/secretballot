<!-- Header -->
    <div class="header bg-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Elections</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
<?php $ele=$call_config->get("SELECT * FROM tbl_election_master Where id=".mysqli_escape_string($call_config->con,$_GET['id'])) ?>
                  <li class="breadcrumb-item active" aria-current="page"><?= $ele['name'] ?></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <p class="text-sm mb-0">
                <?= $ele['description'] ?>
              </p>
              <?= $ele['election_for_position'] ?>
              <div class="float-right">
                <?php
$result=$call_config->get("SELECT * FROM tbl_result_master WHERE election_id='".$ele['id']."'");
if (empty($result)) {
 ?>
 <a href="<?= $call_config->base_url()."application/modal/admin/declare_winner.php?id=".$ele['id'] ?>" class="btn btn-sm btn-warning" >Declare Winner!!</a>
 <?php
}
else
{
 ?>
 <a href="#" class="btn btn-sm btn-success" >Winner Declared!!</a>
 <?php 
}
                ?>
                    </div>
            </div>
      <div class="table-responsive py-4">
              <table class="table table-striped table-bordered">
                               <thead>
                                        <tr>
                                          <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Votes</th>
                                        </tr>
                                    </thead>
                                                      <tbody>
                                       <?php 
                                       
                                   $sql="SELECT * FROM `tbl_candidates_master`";
                                   $i=0;
                                       $result = mysqli_query($call_config->con, $sql);
                                               $i=0;
                                         foreach ($result as $row) {
$vcount=$call_config->get("SELECT COUNT(*) as total FROM tbl_votes_master Where candidate_id='".$row['candidate_id']."' AND election_id='".$ele['id']."'");
                                               ?>
                                   
                                    <tr>
                                      <td><?=++$i?></td>
                                      <td><?= $row["candidate_name"]?></td>
                                      <td><?=$row["username"]?></td>
                                      <td><i class="alert alert-info"><?= $vcount['total'] ?></i></td>
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
</div>
</div>
<!-- END ADD MODAL -->
