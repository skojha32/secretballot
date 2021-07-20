<!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="<?php echo $call_config->base_url() ?>application/view/admin/dashboard/">
Admin
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner"> 
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Home</span>
              </a>
              <div class="collapse" id="navbar-dashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?php echo $call_config->base_url(); ?>application/view/admin/dashboard/" class="nav-link">
                      <span class="sidenav-mini-icon"> H </span>
                      <span class="sidenav-normal"> Home </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo $call_config->base_url(); ?>application/view/admin/edit_password/" class="nav-link">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal"> Update Password </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $call_config->base_url() ?>application/view/admin/students/" >
                <i class="ni ni-single-02 text-orange"></i>
                <span class="nav-link-text">Students</span>
              </a>
            <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?php echo $call_config->base_url() ?>application/view/admin/vendors/new.php" class="nav-link">
                      <span class="sidenav-mini-icon"> N </span>
                      <span class="sidenav-normal"> New </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo $call_config->base_url() ?>application/view/admin/vendors/" class="nav-link">
                      <span class="sidenav-mini-icon"> A </span>
                      <span class="sidenav-normal"> All </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $call_config->base_url() ?>application/view/admin/candidates/">
                <i class="ni ni-check-bold text-info"></i>
                <span class="nav-link-text">Candidates</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
                <i class="ni ni-ui-04 text-pink"></i>
                <span class="nav-link-text">Manage</span>
              </a>
              <div class="collapse" id="navbar-forms">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?php echo $call_config->base_url() ?>application/view/admin/elections/" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Elections </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo $call_config->base_url() ?>application/view/admin/election_results/" class="nav-link">
                      <span class="sidenav-mini-icon"> R </span>
                      <span class="sidenav-normal"> Results </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
        </div>
      </div>
    </div>
  </nav>