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
              </p>
              <div class="float-right">
<a type="button" href="<?= $call_config->adm_base_url()."add_elections/" ?>" class="btn btn-success btn-sm" >+</a>
                    </div>
            </div>

            <div class="table-responsive py-4">
              <table class="table table-striped table-bordered">
                               <thead>
                                        <tr>
                                          <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Semester</th>
                                            <th>Section</th>
                                            <th>Description</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                                      <tbody>
                                       <?php 
                                       
                                   $sql="SELECT * FROM `tbl_election_master` WHERE `status`='1'";
                                   $i=0;
                                       $result = mysqli_query($call_config->con, $sql);
                                               $i=0;
                                         foreach ($result as $row) {
                                               ++$i?>
                                   
                                    <tr>
                                      <td><?=$row["id"]?></td>
                                      <td><?= $row["name"]?></td>
                                      <td><?=$row["scourse"]?></td>
                                      <td><?=$row["ssemester"]?></td>
                                      <td><?=$row["ssection"]?></td>
                                      <td><?=$row["description"]?></td>
                                      <td><?=$row["election_for_position"]?></td>
                                      <td><a class="btn btn-info btn-sm" href="<?= $call_config->base_url()."application/view/admin/view_elections/?id=".$row['id'] ?>">Details!</a></td>
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
