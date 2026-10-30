<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $biodata->username ?? 'profil' }} • my account</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #000000;
      color: #f5f5f5;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .ig-sidebar {
      border-right: 1px solid #262626;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 245px;
      padding: 25px 12px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      z-index: 100;
    }
    .ig-nav-item {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 12px 14px;
      color: #f5f5f5;
      text-decoration: none;
      font-size: 15px;
      border-radius: 8px;
      transition: background 0.2s;
      margin-bottom: 4px;
    }
    .ig-nav-item:hover {
      background-color: #1a1a1a;
      color: #ffffff;
    }
    .ig-nav-item.active {
      font-weight: 700;
    }
    .ig-nav-item i {
      font-size: 22px;
    }
    .main-container {
      margin-left: 245px;
      padding: 30px 40px;
      max-width: 975px;
    }
    @media (max-width: 992px) {
      .ig-sidebar {
        width: 75px;
      }
      .ig-sidebar .nav-text, .ig-logo-text {
        display: none;
      }
      .main-container {
        margin-left: 75px;
        padding: 20px;
      }
    }
    /* Banner Area */
    .profile-banner {
      width: 100%;
      height: 200px;
      border-radius: 14px;
      background: linear-gradient(135deg, #2b1055, #7597de);
      object-fit: cover;
      margin-bottom: 25px;
      border: 1px solid #262626;
    }
    /* Foto Profil & Catatan */
    .avatar-wrapper {
      position: relative;
      display: inline-block;
    }
    .avatar-img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #000;
      outline: 2px solid #333;
    }
    .note-bubble {
      position: absolute;
      top: -12px;
      left: 10px;
      background-color: #262626;
      color: #e0e0e0;
      padding: 4px 12px;
      border-radius: 18px;
      font-size: 12px;
      border: 1px solid #383838;
      box-shadow: 0 4px 12px rgba(0,0,0,0.5);
      white-space: nowrap;
      max-width: 130px;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    /* Bio & Info */
    .profile-username {
      font-size: 20px;
      font-weight: 600;
    }
    .btn-ig-action {
      background-color: #363636;
      color: #fff;
      font-weight: 600;
      font-size: 14px;
      padding: 7px 18px;
      border-radius: 8px;
      border: none;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: background 0.2s;
    }
    .btn-ig-action:hover {
      background-color: #4a4a4a;
      color: #fff;
    }
    .stat-number {
      font-weight: 700;
      color: #fff;
    }
    .stat-label {
      color: #a8a8a8;
      font-size: 15px;
      margin-right: 25px;
    }
    .bio-instansi {
      font-weight: 600;
      font-size: 14px;
      color: #cfcfcf;
      margin-bottom: 3px;
    }
    .bio-text {
      font-size: 14px;
      white-space: pre-line;
      color: #efefef;
      line-height: 1.5;
    }
    .bio-link {
      color: #e0f1ff;
      text-decoration: none;
      font-weight: 500;
      font-size: 14px;
    }
    /* Sorotan / Stories */
    .highlight-item {
      text-align: center;
      margin-right: 22px;
      cursor: pointer;
    }
    .highlight-ring {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      padding: 3px;
      border: 2px solid #363636;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 6px;
      background: #121212;
      transition: transform 0.2s;
    }
    .highlight-ring:hover {
      transform: scale(1.05);
      border-color: #707070;
    }
    .highlight-thumb {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
    }
    .highlight-text {
      font-size: 12px;
      color: #f5f5f5;
      font-weight: 500;
    }
    /* Tab Menu IG */
    .ig-tabs {
      border-top: 1px solid #262626;
      display: flex;
      justify-content: center;
      gap: 50px;
      margin-top: 35px;
    }
    .ig-tab {
      display: flex;
      align-items: center;
      gap: 7px;
      padding: 14px 0;
      color: #737373;
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 1px;
      border-top: 2px solid transparent;
      margin-top: -1px;
    }
    .ig-tab.active {
      color: #ffffff;
      border-top: 2px solid #ffffff;
    }
    /* Grid Postingan */
    .post-card {
      position: relative;
      aspect-ratio: 1 / 1;
      overflow: hidden;
      border-radius: 4px;
      background: #1c1c1c;
      cursor: pointer;
    }
    .post-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s;
    }
    .post-card:hover img {
      transform: scale(1.03);
    }
    .post-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.45);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
      opacity: 0;
      transition: opacity 0.2s;
      color: #fff;
      font-weight: bold;
    }
    .post-card:hover .post-overlay {
      opacity: 1;
    }
    /* Badge Info Mahasiswa */
    .badge-nim {
      background: #1e1e1e;
      border: 1px solid #333;
      color: #0095f6;
      font-size: 12px;
      padding: 4px 10px;
      border-radius: 6px;
    }
  </style>
</head>
<body>

  <!-- Sidebar Instagram -->
  <div class="ig-sidebar">
    <div>
      <a href="{{ route('biodata1083.index') }}" class="d-flex align-items-center mb-4 ps-2 text-decoration-none text-white">
        <i class="bi bi-instagram fs-3 me-2"></i>
        <span class="fs-4 fw-bold ig-logo-text">my account</span>
      </a>

      <nav class="nav flex-column">
        <a href="{{ route('biodata1083.index') }}" class="ig-nav-item">
          <i class="bi bi-arrow-left-circle text-warning"></i>
          <span class="nav-text text-warning fw-bold">Kembali ke CRUD</span>
        </a>

        <a href="{{ route('biodata1083.edit', $biodata->id) }}" class="ig-nav-item">
          <i class="bi bi-plus-square"></i>
          <span class="nav-text">Upload Post / Story</span>
        </a>
        <a href="{{ route('biodata1083.show', $biodata->id) }}" class="ig-nav-item active">
          <i class="bi bi-person-circle"></i>
          <span class="nav-text">Profil</span>
        </a>
      </nav>
    </div>

    <div>
      <a href="{{ route('biodata1083.index') }}" class="ig-nav-item text-secondary">
        <i class="bi bi-list"></i>
        <span class="nav-text">Tabel CRUD 1083</span>
      </a>
    </div>
  </div>

  <!-- Main Container Konten Akun -->
  <div class="main-container">

    <!-- Banner / Header Background Profil -->
    @if($biodata->banner_profil)
      <img src="{{ asset('storage/' . $biodata->banner_profil) }}" alt="Banner Profil" class="profile-banner">
    @else
      <div class="profile-banner d-flex align-items-center justify-content-center text-secondary">
        <small><i class="bi bi-image me-1"></i> Background Banner Profil (Opsional - Bisa diupload lewat Edit Profil)</small>
      </div>
    @endif

    <!-- Profile Header Section -->
    <div class="row align-items-start mb-4">
      <!-- Foto Profil & Catatan -->
      <div class="col-md-4 text-center">
        <div class="avatar-wrapper">
          <div class="note-bubble">
            💭 {{ $biodata->catatan_status ?: 'Catatan...' }}
          </div>
          @if($biodata->foto_profil)
            <img src="{{ asset('storage/' . $biodata->foto_profil) }}" alt="{{ $biodata->nama }}" class="avatar-img">
          @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode($biodata->nama) }}&background=262626&color=fff&size=200" alt="{{ $biodata->nama }}" class="avatar-img">
          @endif
        </div>
      </div>

      <!-- Info Username, Tombol Edit, Stats, dan Bio -->
      <div class="col-md-8 pt-2">
        <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
          <span class="profile-username">{{ $biodata->username ?: 'user_' . $biodata->nim }}</span>
          <i class="bi bi-patch-check-fill text-primary fs-5" title="Terverifikasi Mahasiswa"></i>

          <!-- Tombol Edit Profil menuju halaman edit biodata -->
          <a href="{{ route('biodata1083.edit', $biodata->id) }}" class="btn-ig-action">
            <i class="bi bi-pencil-square"></i> Edit profil
          </a>
          <a href="{{ route('biodata1083.index') }}" class="btn-ig-action">
            <i class="bi bi-arrow-return-left"></i> Tabel CRUD
          </a>
        </div>

        <!-- Statistik Instagram -->
        <div class="d-flex mb-3">
          <span class="stat-label"><span class="stat-number">{{ $biodata->posts->count() }}</span> kiriman</span>
          
          <span class="stat-label"><span class="stat-number">540</span> diikuti</span>
        </div>

        <!-- Nama Lengkap & Instansi -->
        <div class="fw-bold mb-1">{{ $biodata->nama }}</div>
        <div class="bio-instansi">{{ $biodata->instansi ?: 'POLITEKNIK CALTEX RIAU' }}</div>

        <!-- Data Akademik dari CRUD Biodata -->
        <div class="my-2 d-flex flex-wrap gap-2">
          <span class="badge-nim"><i class="bi bi-card-heading me-1"></i>NIM: {{ $biodata->nim }}</span>
          <span class="badge-nim"><i class="bi bi-mortarboard me-1"></i>{{ $biodata->jurusan }}</span>
          <span class="badge-nim"><i class="bi bi-gender-ambiguous me-1"></i>{{ $biodata->gender }}</span>
        </div>

        <!-- Deskripsi Bio Pribadi -->
        <div class="bio-text mt-2">
          @if($biodata->bio)
            {{ $biodata->bio }}
          @else
            🏆 Mahasiswa Aktif | Developer Web
            "Belajar terus tanpa henti, berkarya untuk masa depan"
            Alamat: {{ $biodata->alamat }}
          @endif
        </div>

        <!-- Link Website / Medsos -->
        @if($biodata->link_website)
          <div class="mt-2">
            <i class="bi bi-link-45deg"></i>
            <a href="{{ $biodata->link_website }}" target="_blank" class="bio-link">{{ $biodata->link_website }}</a>
          </div>
        @else
          <div class="mt-2">
            <i class="bi bi-envelope"></i>
            <span class="text-secondary small ms-1">{{ $biodata->email }}</span>
          </div>
        @endif
      </div>
    </div>

    <!-- Bagian Sorotan / Stories -->
    <div class="d-flex align-items-center mb-4 overflow-auto pb-2">
      <!-- Story bawaan / dari database -->
      @forelse($biodata->stories as $story)
        <div class="highlight-item">
          <div class="highlight-ring">
            <img src="{{ asset('storage/' . $story->foto_story) }}" class="highlight-thumb" alt="Story">
          </div>
          <div class="highlight-text">{{ $story->judul_sorotan }}</div>
        </div>
      @empty
        <!-- Sorotan Default mirip referensi foto (Film, MSQ, Puisi) -->
        <div class="highlight-item">
          <div class="highlight-ring">
            <div class="d-flex align-items-center justify-content-center w-100 h-100 text-secondary fs-4">🎬</div>
          </div>
          <div class="highlight-text">Film</div>
        </div>
        <div class="highlight-item">
          <div class="highlight-ring">
            <div class="d-flex align-items-center justify-content-center w-100 h-100 text-secondary fs-4">📜</div>
          </div>
          <div class="highlight-text">MSQ</div>
        </div>
        <div class="highlight-item">
          <div class="highlight-ring">
            <div class="d-flex align-items-center justify-content-center w-100 h-100 text-secondary fs-4">✍️</div>
          </div>
          <div class="highlight-text">Puisi</div>
        </div>
      @endforelse

      <!-- Tombol Tambah Sorotan Baru (Arahkan ke Edit) -->
      <a href="{{ route('biodata1083.edit', $biodata->id) }}" class="highlight-item text-decoration-none">
        <div class="highlight-ring border-dashed">
          <i class="bi bi-plus-lg fs-3 text-secondary"></i>
        </div>
        <div class="highlight-text text-secondary">Baru</div>
      </a>
    </div>

    <!-- Tab Navigasi Instagram (POSTINGAN, TERSIMPAN, DITANDAI) -->
    <div class="ig-tabs">
      <a href="#" class="ig-tab active">
        <i class="bi bi-grid-3x3"></i> POSTINGAN
      </a>
      <a href="#" class="ig-tab">
        <i class="bi bi-bookmark"></i> TERSIMPAN
      </a>
      <a href="#" class="ig-tab">
        <i class="bi bi-person-square"></i> DITANDAI
      </a>
    </div>

    <!-- Feed Grid Postingan Akun -->
    <div class="row g-3 mt-1">
      @forelse($biodata->posts as $post)
        <div class="col-4">
          <div class="post-card">
            <img src="{{ asset('storage/' . $post->foto_post) }}" alt="Post">
            <div class="post-overlay">
              <span><i class="bi bi-heart-fill me-1"></i> {{ $post->jumlah_like }}</span>
              <span><i class="bi bi-chat-fill me-1"></i> 14</span>
            </div>
          </div>
          @if($post->caption)
            <small class="text-secondary d-block mt-1 text-truncate">{{ $post->caption }}</small>
          @endif
        </div>
      @empty
        <!-- Jika belum upload postingan, tampilkan placeholder interaktif -->
        <div class="col-12 text-center py-5">
          <div class="mb-3">
            <i class="bi bi-camera fs-1 text-secondary"></i>
          </div>
          <h5 class="fw-bold">Belum Ada Postingan</h5>
          <p class="text-secondary small">Bagikan momen foto postingan pertama Anda dengan mengunggahnya melalui menu Edit Profil.</p>
          <a href="{{ route('biodata1083.edit', $biodata->id) }}" class="btn btn-primary btn-sm px-4">
            <i class="bi bi-cloud-arrow-up me-1"></i> Unggah Postingan Baru
          </a>
        </div>
      @endforelse
    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
