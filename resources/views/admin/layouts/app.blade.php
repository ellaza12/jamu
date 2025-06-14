<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamu</title>
    <!-- DataTables Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&subset=latin-ext">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <div class="page">
        <div class="page-main">
            <!-- Header -->
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand">
                            <img src="{{ asset('asset/img/jaaaa.jpg') }}" style="width: 100px; height: 40px">
                        </a>
                        <div class="d-flex order-lg-2 ml-auto">
                            <div class="dropdown">
                                <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown" id="userDropdownToggle">
                                    <span class="avatar d-flex align-items-center justify-content-center bg-success text-white" style="width: 36px; height: 36px; border-radius: 50%;">
                                        <i class="fe fe-user"></i>
                                    </span>
                                    <span class="ml-2 d-none d-lg-block">
                                        <span class="user-name" style="color: black;">{{ Auth::User()->name }}</span>
                                        <i id="dropdownIcon" class="fe fe-chevron-down ml-1" style="color: #3cb815;"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="/admin/change">
                                        <i class="dropdown-icon fe fe-lock"></i> Ganti Password
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="dropdown-icon fe fe-log-out"></i> Sign out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                            <span class="header-toggler-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg order-lg-first">
                            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                              <li class="nav-item">
                                  <a href="/admin/index" class="nav-link {{ $activePage == 'dashboard' ? 'active' : '' }}">
                                      <i class="fe fe-home"></i> Home
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/admin/profil" class="nav-link {{ $activePage == 'profil' ? 'active' : '' }}">
                                      <i class="fe fe-user"></i> Profil
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/admin/about" class="nav-link {{ $activePage == 'about' ? 'active' : '' }}">
                                      <i class="fe fe-info"></i> Tentang Kami
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/admin/video" class="nav-link {{ $activePage == 'video' ? 'active' : '' }}">
                                      <i class="fe fe-video"></i> Video
                                  </a>
                              </li>
                               <li class="nav-item">
                                  <a href="/admin/kategori" class="nav-link {{ $activePage == 'kategori' ? 'active' : '' }}">
                                      <i class="fe fe-shopping-bag"></i> Kategori
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/admin/produk" class="nav-link {{ $activePage == 'produk' ? 'active' : '' }}">
                                      <i class="fe fe-shopping-bag"></i> Produk
                                  </a>
                              </li>
                               <li class="nav-item">
                                  <a href="/admin/galeri" class="nav-link {{ $activePage == 'galeri' ? 'active' : '' }}">
                                      <i class="fe fe-book-open"></i> Galeri
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/admin/blog" class="nav-link {{ $activePage == 'blog' ? 'active' : '' }}">
                                      <i class="fe fe-book-open"></i> Blog
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/admin/artikel" class="nav-link {{ $activePage == 'artikel' ? 'active' : '' }}">
                                      <i class="fe fe-book-open"></i> Artikel
                                  </a>
                              </li>
                               <li class="nav-item">
                                  <a href="/admin/kontak" class="nav-link {{ $activePage == 'kontak' ? 'active' : '' }}">
                                      <i class="fe fe-book-open"></i> Kontak
                                  </a>
                              </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
            <!-- Footer -->
            <div class="container mt-0 mb-3">
                <div class="card text-center" style="border-radius: 10px; margin-top: 5px;">
                    <div class="card-body" style="color: #3cb815">
                        Jamu - Copyright © {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap JS (for modal, dropdown, etc) -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
    <!-- DataTables Init -->
    <script>
    $(document).ready(function() {
        $('.data-table').DataTable({
    responsive: true,
    language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ data",
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        infoEmpty: "Tidak ada data tersedia",
        infoFiltered: "(disaring dari _MAX_ total data)"
    }
});
    });
    </script>
    <!-- Dropdown icon toggle -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownToggle = document.getElementById('userDropdownToggle');
        const icon = document.getElementById('dropdownIcon');
        if (dropdownToggle && icon) {
            dropdownToggle.addEventListener('click', function () {
                icon.classList.toggle('fe-chevron-up');
                icon.classList.toggle('fe-chevron-down');
            });
        }
    });
    </script>
</body>
</html>
