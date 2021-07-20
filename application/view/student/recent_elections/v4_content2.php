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
                  <li class="breadcrumb-item active" aria-current="page"><a href="#">Elections</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Candidates</li>
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
               <h3 class="mb-0">Candidates</h3>
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
                                            <th>User Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       $post_fix=null;
                                       $sql2=$call_config->get("SELECT * FROM tbl_votes_master WHERE election_id='".$get_id."' AND voter_id='".$sess_data_var['sess_user_id']."' ");
                                       if(!empty($sql2))
                                       {
                                        $post_fix='candidate_id='.$sql2['candidate_id'];
                                       }
                                    $sql="SELECT * FROM `tbl_candidates_master` WHERE id='".$get_id."' ".$post_fix." ";
                                   $i=0;
                                       $result = mysqli_query($call_config->con, $sql);
                                               $i=0;
                                        if($result){
                                         foreach ($result as $row) {
                                               ?>
                                   
                                    <tr>
                                      <td><?=++$i?></td>
                                      <td><?= $row["candidate_name"]?></td>
                                      <td><?=$row["username"]?></td>
                                      <td>
                                        <?php if($post_fix==null || $post_fix=''){?>
                                        <a class="btn btn-success btn-sm" href="<?= $call_config->base_url()."application/modal/studentmodel/vote.php?candidate_id=".$row['candidate_id']."&election_id=".$get_id ?>">Vote This candidate!!</a>
                                        <?php }else{?>
                                          <a class="btn btn-danger btn-sm" href="#">Voted For This Election!!</a><?php }?></td>
                                        </tr>
                                   
                                  
        
</div>
</div>
</div>
<!-- END Edit MODAL -->
<?php }} ?>

                                   </tbody>
                            </table>
            </div>
          </div>
</div>
</div>
</div>
<!-- END ADD MODAL -->
