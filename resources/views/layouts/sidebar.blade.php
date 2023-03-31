<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <a href="#" class="nav-link">
            <div class="nav-profile-image">
              <img src="assets/images/faces/face1.jpg" alt="profile">
              <span class="login-status online"></span>
              <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column">
              <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
              <span class="text-secondary text-small">Project Manager</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ 'dashboard' }}">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href='{{ url('mahasiswa') }}'>
            <span class="menu-title">Tabel Mahasiswa</span>
            <i class="mdi mdi-contacts menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='{{ url('bayar') }}'>
            <span class="menu-title">Tabel Bayar</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>

        <li class="nav-item sidebar-actions">
          <span class="nav-link">
            <div class="border-bottom">
              <h6 class="font-weight-normal mb-3"></h6>
            </div>
            <button ></button>
            <div >
              <div >
                <p ></p>
              </div>
              <ul >
                <li></li>
                <li></li>
              </ul>
            </div>
          </span>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
       @yield('content')


      </div>
      <!-- content-wrapper ends -->

