@if(Auth::user()->role == 'admin')
    <hr class="my-0 sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Rekam Medis
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-book-medical"></i>
          <span>Rekam Medis</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Rekam Medis</h6>
            <a class="collapse-item" href="/rekam-medis">Rekam Medis</a>
            <h6 class="collapse-header">Pasien</h6>
            <a class="collapse-item" href="/rawat">Rawat</a>
            <a class="collapse-item" href="/rawat-jalan">Rawat Jalan</a>
          </div>
        </div>
      </li>
      <br>
      <div class="sidebar-heading">
        Menu
      </div>
      <li class="nav-item">
        <a class="nav-link" href="/riwayat-penyakit">
          <i class="fas fa-fw fa-medkit"></i>
          <span>Riwayat Penyakit</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pasien">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pasien</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/obat">
          <i class="fas fa-pills"></i>
          <span>Data Obat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/petugas">
          <i class="fas fa-user-md"></i>
          <span>Petugas UKS</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/jabatan">
          <i class="fas fa-id-card"></i>
          <span>Jabatan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/info">
          <i class="far fa-newspaper"></i>
          <span>Info UKS</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link">
            <i class="fas fa-info"></i>
            <span>1.0.0 version</span>
          </a>
      </li>

@elseif(Auth::user()->role == 'petugas')
      <hr class="my-0 sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Rekam Medis
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-book-medical"></i>
          <span>Rekam Medis</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Rekam Medis</h6>
            <a class="collapse-item" href="/rekam-medis">Rekam Medis</a>
            <h6 class="collapse-header">Pasien</h6>
            <a class="collapse-item" href="/rawat">Rawat</a>
            <a class="collapse-item" href="/rawat-jalan">Rawat Jalan</a>
          </div>
        </div>
      </li>
      <br>
      <div class="sidebar-heading">
        Menu
      </div>
      <li class="nav-item">
        <a class="nav-link" href="/riwayat-penyakit">
          <i class="fas fa-fw fa-medkit"></i>
          <span>Riwayat Penyakit</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pasien">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pasien</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/obat">
          <i class="fas fa-pills"></i>
          <span>Data Obat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/jabatan">
          <i class="fas fa-id-card"></i>
          <span>Jabatan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/info">
          <i class="far fa-newspaper"></i>
          <span>Info UKS</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link">
            <i class="fas fa-info"></i>
            <span>1.0.0 version</span>
          </a>
      </li>
@else
      <hr class="my-0 sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menu
      </div>
      <li class="nav-item">
        <a class="nav-link" href="/obat">
          <i class="fas fa-pills"></i>
          <span>Data Obat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/info">
          <i class="far fa-newspaper"></i>
          <span>Info UKS</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link">
            <i class="fas fa-info"></i>
            <span>1.0.0 version</span>
          </a>
      </li>
@endif
