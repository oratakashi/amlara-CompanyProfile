<div class="left-side-menu">
  <div class="media user-profile mt-2 mb-2">
    <img src="{{ asset('backend') }}/images/no-pict.png" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
    <img src="{{ asset('backend') }}/images/no-pict.png" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

    <div class="media-body">
      <h6 class="pro-user-name mt-0 mb-0">{{ Session::get('name') }}</h6>
      <span class="pro-user-desc">{{ Session::get('username') }}</span>
    </div>
  </div>
  <div class="sidebar-content">
    <!--- Sidemenu -->
    <div id="sidebar-menu" class="slimscroll-menu">
      <ul class="metismenu" id="menu-bar">
        <li class="menu-title">Menu</li>

        <li>
          <a href="{{ url('admin') }}">
            <i data-feather="home"></i>
            <span> Dashboard </span>
          </a>
        </li>

        <li>
          <a href="{{ url('admin/category.html') }}">
            <i data-feather="at-sign"></i>
            <span> Kategori </span>
          </a>
        </li>

        <li>
          <a href="{{ url('admin/course.html') }}">
            <i data-feather="book-open"></i>
            <span> Paket Materi </span>
          </a>
        </li>

        <li>
          <a href="{{ url('admin/products.html') }}">
            <i data-feather="box"></i>
            <span> Materi </span>
          </a>
        </li>

        <li>
          <a href="{{ url('admin/details.html') }}">
            <i data-feather="check-circle"></i>
            <span> Pilihan Materi </span>
          </a>
        </li>

        <li>
          <a href="{{ url('admin/logout.js') }}">
            <i data-feather="log-out"></i>
            <span> Log Out </span>
          </a>
        </li>
      </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
  </div>
  <!-- Sidebar -left -->

</div>
