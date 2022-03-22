<!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <?php if (session()->get('role') == 'admin') { ?>
                <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/useradmin"
                  aria-expanded="false"
                  ><i class="mdi mdi-account"></i
                  ><span class="hide-menu">Admin & User</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/data_angkatan"
                  aria-expanded="false"
                  ><i class="mdi mdi-account"></i
                  ><span class="hide-menu">Data Angkatan</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/data_komunitas"
                  aria-expanded="false"
                  ><i class="mdi mdi-account"></i
                  ><span class="hide-menu">Data Komunitas</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/data_anggota"
                  aria-expanded="false"
                  ><i class="mdi mdi-account"></i
                  ><span class="hide-menu">Data Anggota Komunitas</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-database"></i
                  ><span class="hide-menu">Manage Komunitas</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="/admin/event" class="sidebar-link"
                      ><i class="mdi mdi-file"></i
                      ><span class="hide-menu"> Event</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/kegiatan" class="sidebar-link"
                      ><i class="mdi mdi-file"></i
                      ><span class="hide-menu"> Kegiatan</span></a
                    >
                  </li>
                </ul>
              </li>
              <?php } ?>
              
              <?php if (session()->get('role') == 'koordinator') { ?>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/data_anggota"
                  aria-expanded="false"
                  ><i class="mdi mdi-account"></i
                  ><span class="hide-menu">Data Anggota Komunitas</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-database"></i
                  ><span class="hide-menu">Manage Komunitas</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="/admin/event" class="sidebar-link"
                      ><i class="mdi mdi-file"></i
                      ><span class="hide-menu"> Event</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/kegiatan" class="sidebar-link"
                      ><i class="mdi mdi-file"></i
                      ><span class="hide-menu"> Kegiatan</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/absensi" class="sidebar-link"
                      ><i class="mdi mdi-file"></i
                      ><span class="hide-menu"> Absensi</span></a
                    >
                  </li>
                </ul>
              </li>
              <?php } ?>
            
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->