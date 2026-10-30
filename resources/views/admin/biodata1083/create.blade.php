<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Volt - Tambah Biodata 1083</title>
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
      <h2 class="h4">Tambah Biodata Mahasiswa (biodata_1083)</h2>
      <p class="mb-0">Form input data biodata lengkap dengan validasi dan upload foto.</p>
    </div>
    <div>
      <a href="{{ route('biodata1083.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mb-4">
      <div class="card border-0 shadow components-section">
        <div class="card-body">

          {{-- Tampilan Alert Error Validasi Global --}}
          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
              <strong>Terdapat kesalahan pada inputan Anda:</strong>
              <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <form action="{{ route('biodata1083.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
              <!-- Nama Lengkap -->
              <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Contoh: Harun Al Rasyid">
                @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- NIM -->
              <div class="col-md-6 mb-3">
                <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
                <input type="text" id="nim" name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}" placeholder="Contoh: 2024101083">
                @error('nim')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <!-- Jurusan -->
              <div class="col-md-4 mb-3">
                <label for="jurusan" class="form-label">Jurusan / Prodi <span class="text-danger">*</span></label>
                <input type="text" id="jurusan" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}" placeholder="Contoh: Teknik Informatika">
                @error('jurusan')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Tanggal Lahir -->
              <div class="col-md-4 mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Gender -->
              <div class="col-md-4 mb-3">
                <label for="gender" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror">
                  <option value="">-- Pilih Gender --</option>
                  <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Laki-laki (Male)</option>
                  <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Perempuan (Female)</option>
                </select>
                @error('gender')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <!-- Email -->
              <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Contoh: user@domain.com">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Foto Profil (Bonus) -->
              <div class="col-md-6 mb-3">
                <label for="foto_profil" class="form-label">Foto Profil <span class="badge bg-success">Nilai Bonus</span></label>
                <input type="file" id="foto_profil" name="foto_profil" class="form-control @error('foto_profil') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Format: JPG, JPEG, PNG (Maks 2MB)</small>
                @error('foto_profil')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- Alamat -->
            <div class="mb-4">
              <label for="alamat" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
              <textarea id="alamat" name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
              @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Action Buttons -->
            <div>
              <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
              <a href="{{ route('biodata1083.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>

          </form>

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
