<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Volt - Data Biodata 1083</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets-admin/img/favicon/favicon-32x32.png') }}">
<link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
  <a class="navbar-brand me-lg-5" href="#">
    <img class="navbar-brand-dark" src="{{ asset('assets-admin/img/brand/light.svg') }}" alt="Volt logo" />
  </a>
  <div class="d-flex align-items-center">
    <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-4 pt-3">
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item">
        <a href="#" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon">
            <img src="{{ asset('assets-admin/img/brand/light.svg') }}" height="20" width="20" alt="Volt Logo">
          </span>
          <span class="mt-1 ms-1 sidebar-text">UTS Web Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
          </span>
          <span class="sidebar-text">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('pelanggan.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
          </span>
          <span class="sidebar-text">Pelanggan (Modul)</span>
        </a>
      </li>
      <!-- Menu Biodata 1083 -->
      <li class="nav-item active">
        <a href="{{ route('biodata1083.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
          </span>
          <span class="sidebar-text fw-bold text-warning">Biodata 1083</span>
        </a>
      </li>
    </ul>
  </div>
</nav>

<main class="content">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
      <h2 class="h4">Data Biodata Mahasiswa (Tabel: biodata_1083)</h2>
      <p class="mb-0">Kelola master data biodata mahasiswa dengan fitur foto profil.</p>
    </div>
    <div>
      <a href="{{ route('biodata1083.create') }}" class="btn btn-success text-white">
        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Biodata
      </a>
    </div>
  </div>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="row">
    <div class="col-12 mb-4">
      <div class="card border-0 shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded align-middle">
              <thead class="thead-light">
                <tr>
                  <th class="border-0">No</th>
                  <th class="border-0">Foto</th>
                  <th class="border-0">NIM</th>
                  <th class="border-0">Nama</th>
                  <th class="border-0">Jurusan</th>
                  <th class="border-0">Tgl Lahir</th>
                  <th class="border-0">Gender</th>
                  <th class="border-0">Email</th>
                  <th class="border-0 rounded-end text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($dataBiodata as $index => $item)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>
                    @if($item->foto_profil)
                      <img src="{{ asset('storage/' . $item->foto_profil) }}" alt="Foto" class="rounded-circle shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
                    @else
                      <span class="badge bg-secondary">No Foto</span>
                    @endif
                  </td>
                  <td><span class="fw-bold">{{ $item->nim }}</span></td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->jurusan }}</td>
                  <td>{{ $item->tanggal_lahir }}</td>
                  <td>
                    @if($item->gender == 'Male')
                      <span class="badge bg-info">Laki-laki</span>
                    @else
                      <span class="badge bg-danger">Perempuan</span>
                    @endif
                  </td>
                  <td>{{ $item->email }}</td>
                  <td class="text-center">
                    <a href="{{ route('biodata1083.show', $item->id) }}" class="btn btn-primary btn-sm text-white me-1" title="Lihat Detail Akun Ala Instagram">
                      <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                      Lihat Detail Akun
                    </a>
                    <a href="{{ route('biodata1083.edit', $item->id) }}" class="btn btn-info btn-sm text-white me-1">
                      Edit
                    </a>
                    <form action="{{ route('biodata1083.destroy', $item->id) }}" method="POST" style="display:inline">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data biodata ini?')">
                        Hapus
                      </button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="9" class="text-center py-4 text-muted">Belum ada data biodata. Silakan tambah data baru.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>
</html>
