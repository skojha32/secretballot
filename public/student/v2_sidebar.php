<!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="<?php echo $call_config->base_url() ?>application/view/student/dashboard/">
          Student
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
              <a class="nav-link active" href="<?php echo $call_config->base_url() ?>application/view/student/dashboard/">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Home</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $call_config->base_url() ?>application/view/student/recent_elections/">
                <i class="ni ni-check-bold text-info"></i>
                <span class="nav-link-text">Recent Elections</span>
              </a>
             
            </li>
           
                 
                 
          </ul>
          <!-- Divider -->
          <hr class="my-3">
        </div>
      </div>
    </div>
  </nav>