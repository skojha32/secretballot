<!-- Header -->
    <div class="header bg-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Students</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Elections</li>
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
               <h3 class="mb-0">Recents Elections</h3>
              </p>
              <div class="float-right">
                    </div>
            </div>

            <div class="table-responsive py-4">
              <table class="table table-striped table-bordered">
                               <thead>
                                        <tr>
                                          <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Election For Position</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                                      <tbody>
                                       <?php 
                                   $course = $call_config->get("SELECT scourse,ssemester,ssection FROM `tbl_students_master` WHERE member_id='".$sess_data_var['sess_user_id']."'");
                                     
                                   $sql="SELECT * FROM `tbl_election_master` WHERE (scourse='".$course['scourse']."' AND ssemester='".$course['ssemester']."' AND ssection='".$course['ssection']."') OR (scourse='NULL' AND ssemester='NULL' AND ssection='NULL') AND `status`='1'  order by id DESC;";
                                   $i=0;
                                       $result = mysqli_query($call_config->con, $sql);
                                       
                                               $i=0;
                                         foreach ($result as $row) {
                                          ++$i?>
                                   
                                    <tr>
                                      <td><?=$row["id"]?></td>
                                      <td><?= $row["name"]?></td>
                                      <td><?=$row["description"]?></td>
                                      <td><?=$row["election_for_position"]?></td>
                                      <td><?php $sql2="SELECT * FROM `tbl_votes_master` WHERE election_id='".$row['id']."' AND voter_id='".$sess_data_var['sess_user_id']."'";
                                      $check = mysqli_query($call_config->con, $sql2);
                                      if(mysqli_num_rows($check) > 0){?>
                                        <span class="badge badge-danger">Voted</span><?php
                                      }
                                      else{?>
                                        <span class="badge badge-success">Not Voted</span>
                                        <?php } ?></td>
                                      <td><a class="btn btn-info btn-sm" href="<?= $call_config->base_url()."application/view/student/recent_elections/index2.php?id=".$row['id'] ?>">Details/Do Vote!</a></td>
                                        </tr>

                                        
        
</div>
</div>
</div>
<!-- END Edit MODAL -->
<?php } ?>

<?php 
                                     
                                   $sql="SELECT * FROM `tbl_election_master` WHERE scourse IS NULL AND ssemester IS NULL AND ssection IS NULL AND `status`='1' order by id DESC;";
                                   $i=0;
                                       $result = mysqli_query($call_config->con, $sql);
                                       
                                               $i=0;
                                         foreach ($result as $row) {
                                               ++$i?>
                                   
                                    <tr>
                                      <td><?= $row["id"]?></td>
                                      <td><?= $row["name"]?></td>
                                      <td><?=$row["description"]?></td>
                                      <td><?=$row["election_for_position"]?></td>
                                      <td><?php $sql2="SELECT * FROM `tbl_votes_master` WHERE election_id='".$row['id']."' AND voter_id='".$sess_data_var['sess_user_id']."'";
                                      $check = mysqli_query($call_config->con, $sql2);
                                      if(mysqli_num_rows($check) > 0){?>
                                        <span class="badge badge-danger">Voted</span><?php
                                      }
                                      else{?>
                                        <span class="badge badge-success">Not Voted</span>
                                        <?php } ?></td>
                                      <td><a class="btn btn-info btn-sm" href="<?= $call_config->base_url()."application/view/student/recent_elections/index2.php?id=".$row['id'] ?>">Details/Do Vote!</a></td>
                                        </tr>
        
</div>
</div>
</div>
<!-- END Edit MODAL -->
<?php } ?>


                                   </tbody>
                            </table>
            </div>
          </div>
</div>
</div>
</div>
<!-- END ADD MODAL -->