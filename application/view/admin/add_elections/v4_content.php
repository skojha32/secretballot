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
                  <li class="breadcrumb-item active" aria-current="page">Add Elections</li>
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
                    </div>
            </div>
<form class="form" method="POST" action="<?= $call_config->base_url()."application/modal/admin/add_election.php" ?>">
<div class="row">
    <div class="col-lg-4"><label>Name</label><input type="text" pattern="[a-zA-Z ]+" required="" name="name" class="form-control"></div>
    <div class="col-lg-4"><label>Course</label><input type="text" name="course" class="form-control"></div>
    <div class="col-lg-4"><label>Semester</label><input type="text" name="sem" maxlength="1" class="form-control"></div>
    <div class="col-lg-4"><label>Section</label><input type="text" name="sec" maxlength="1" class="form-control"></div>
    <div class="col-lg-4"><label>Description</label><textarea name="description" class="form-control" required="" placeholder="Enter Description..."></textarea></div>
      <div class="col-lg-4"><label>Position</label><select name="election_for_position" required="" class="form-control">
        <optgroup>
          <option selected="" disabled="">--Select Position--</option>
          <option value="CR">CR</option>
          <option value="PRESIDENT">PRESIDENT</option>
          <option value="VICE PRESIDENT">VICE PRESIDENT</option>
        </optgroup>
      </select></div>
<div class="col-lg-12"><br><center><input class="btn btn-sm btn-info" type="submit" name="sub" value="Add!!"></center><br></div>
</div>  
</form>
</div>
</div>

            </div>
          </div>
</div>
</div>
</div>
<!-- END ADD MODAL -->
