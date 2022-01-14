  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/assets/padinet/logo/logo_only_padinet_coloured.png" alt="<?php echo $this->config->item('appname')?>" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $this->config->item('appname')?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/padinet/logo/logo_gold1.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin PadiApp</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <?php $this->load->view('templates/common/sidebarmenu');?>
    </div>
    <!-- /.sidebar -->
  </aside>

