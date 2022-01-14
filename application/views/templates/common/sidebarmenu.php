      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/surveys" class="nav-link <?php echo $actstatus['surveys']?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Surveys
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/installs" class="nav-link <?php echo $actstatus['installs']?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Installs
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
