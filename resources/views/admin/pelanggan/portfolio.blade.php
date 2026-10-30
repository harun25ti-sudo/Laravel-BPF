<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - {{ $pelanggan->first_name }} {{ $pelanggan->last_name }}</title>
    <!-- Google Fonts: Space Grotesk / Poppins / Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Caveat:wght@600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --primary-yellow: #f8b825;
            --primary-yellow-light: #fef4db;
            --primary-yellow-bright: #ffc83b;
            --dark-color: #1a1a1a;
            --dark-card: #222222;
            --gray-text: #6c757d;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fbfbfd;
            color: #2b2b2b;
            overflow-x: hidden;
        }

        .handwritten {
            font-family: 'Caveat', cursive;
            letter-spacing: 1px;
        }

        /* Top Navbar */
        .portfolio-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 1.2rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-logo {
            font-weight: 800;
            font-size: 1.4rem;
            color: #111;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .nav-logo-circle {
            width: 18px;
            height: 18px;
            border: 4px solid var(--primary-yellow);
            border-radius: 50%;
            display: inline-block;
        }

        .portfolio-nav .nav-link {
            color: #495057;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }

        .portfolio-nav .nav-link:hover,
        .portfolio-nav .nav-link.active {
            color: #111;
            font-weight: 700;
        }

        .portfolio-nav .nav-link.active::after {
            content: '';
            display: block;
            width: 16px;
            height: 3px;
            background: var(--primary-yellow);
            border-radius: 2px;
            margin-top: 2px;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            padding: 5rem 0 3rem 0;
            overflow: hidden;
        }

        /* Organic blob shapes inspired by reference */
        .blob-yellow-hero {
            position: absolute;
            right: 5%;
            top: 0%;
            width: 480px;
            height: 600px;
            background: #f7bc32;
            border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
            z-index: 1;
            opacity: 0.95;
            transform: rotate(-10deg);
        }

        .blob-dark-pattern {
            position: absolute;
            left: -80px;
            top: 15%;
            width: 260px;
            height: 360px;
            background: #1e1e1e;
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            z-index: 1;
            overflow: hidden;
            opacity: 0.92;
        }

        .blob-dark-pattern::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(#3a3a3a 1.5px, transparent 1.5px);
            background-size: 16px 16px;
            opacity: 0.5;
        }

        .hero-content {
            position: relative;
            z-index: 5;
        }

        .hero-watermark {
            font-size: 5.5rem;
            color: #ececec;
            font-weight: 700;
            line-height: 1;
            margin-bottom: -1.5rem;
            opacity: 0.7;
        }

        .hero-title {
            font-size: 3.2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1.15;
            color: #111;
        }

        .hero-subtitle {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ebb02d;
            margin-bottom: 1.2rem;
        }

        .hero-bio {
            color: #6c757d;
            font-size: 1.05rem;
            max-width: 460px;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .meta-info-box {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 2.5rem;
        }

        .meta-item .meta-label {
            font-weight: 700;
            font-size: 0.88rem;
            color: #222;
            text-transform: capitalize;
            margin-bottom: 2px;
        }

        .meta-item .meta-value {
            color: #71717a;
            font-size: 0.92rem;
        }

        .hero-image-wrapper {
            position: relative;
            z-index: 4;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-profile-img {
            max-width: 100%;
            height: 520px;
            object-fit: cover;
            border-radius: 30px;
            position: relative;
            z-index: 3;
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        .hero-profile-placeholder {
            width: 100%;
            max-width: 420px;
            height: 480px;
            background: #ffffff;
            border: 2px dashed #e2e8f0;
            border-radius: 30px;
            position: relative;
            z-index: 3;
            box-shadow: 0 15px 30px rgba(0,0,0,0.06);
        }

        .secondary-img-placeholder {
            width: 320px;
            height: 420px;
            max-width: 100%;
            background: #ffffff;
            border: 2px dashed #e2e8f0;
            border-radius: 28px;
            position: relative;
            z-index: 3;
            box-shadow: 0 15px 30px rgba(0,0,0,0.06);
        }

        /* Floating Pill Badges */
        .pill-features {
            position: relative;
            z-index: 6;
            margin-top: -30px;
            margin-bottom: 4rem;
        }

        .feature-card-pill {
            background: #fff;
            border-radius: 50px;
            padding: 1rem 1.6rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #f0f0f0;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .feature-card-pill:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .feature-card-pill .icon-bubble {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            margin-right: 12px;
        }

        /* Second Section: Need Creative Design & Banner */
        .about-section {
            position: relative;
            padding: 5rem 0;
            background: #fff;
        }

        .blob-yellow-secondary {
            position: absolute;
            left: 5%;
            top: 15%;
            width: 380px;
            height: 380px;
            background: #fac742;
            border-radius: 50% 50% 40% 60% / 60% 40% 60% 40%;
            z-index: 1;
            opacity: 0.9;
        }

        .secondary-img-wrapper {
            position: relative;
            z-index: 3;
        }

        .secondary-img {
            max-width: 100%;
            max-height: 480px;
            object-fit: cover;
            border-radius: 28px;
            position: relative;
            z-index: 3;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .section-label-vertical {
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #999;
            margin-bottom: 0.5rem;
        }

        .section-heading-bold {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            color: #111;
            margin-bottom: 1.5rem;
        }

        /* Skills & Service Grid Section */
        .skills-section {
            padding: 5rem 0;
            background: #fbfbfd;
        }

        .skill-bar-container {
            margin-bottom: 1.5rem;
        }

        .skill-bar-label {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .progress-custom {
            height: 7px;
            border-radius: 10px;
            background-color: #ebebeb;
            overflow: hidden;
        }

        .progress-bar-custom {
            background-color: #f7bc32;
            border-radius: 10px;
        }

        /* Service Cards (White floating boxes with icons) */
        .service-box {
            background: #fff;
            border-radius: 20px;
            padding: 2.2rem 1.8rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.25s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(0,0,0,0.03);
        }

        .service-box:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(0,0,0,0.08);
            border-color: #f7bc32;
        }

        .service-box .service-icon {
            font-size: 2.2rem;
            color: #1a1a1a;
            margin-bottom: 1rem;
        }

        .service-box .service-name {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0;
            color: #1a1a1a;
        }

        /* Bottom Data Table Section (Hendi Table) */
        .table-section {
            padding: 4rem 0 6rem 0;
            background: #ffffff;
            border-top: 1px solid #f0f0f0;
        }

        .custom-table {
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .custom-table thead th {
            background-color: #f8f9fa;
            border: none;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6c757d;
            padding: 1rem;
        }

        .custom-table tbody tr {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
            border-radius: 12px;
            transition: transform 0.15s ease;
        }

        .custom-table tbody tr:hover {
            transform: scale(1.005);
            box-shadow: 0 5px 15px rgba(0,0,0,0.06);
        }

        .custom-table tbody td {
            padding: 1.1rem 1rem;
            border: none;
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .custom-table tbody tr td:first-child {
            border-radius: 12px 0 0 12px;
            font-weight: 600;
        }

        .custom-table tbody tr td:last-child {
            border-radius: 0 12px 12px 0;
        }

        /* Buttons */
        .btn-black {
            background-color: #1a1a1a;
            color: #fff;
            font-weight: 600;
            padding: 0.75rem 1.8rem;
            border-radius: 50px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 2px solid #1a1a1a;
        }

        .btn-black:hover {
            background-color: #333;
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-yellow {
            background-color: #f8b825;
            color: #1a1a1a;
            font-weight: 700;
            padding: 0.75rem 1.8rem;
            border-radius: 50px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 2px solid #f8b825;
        }

        .btn-yellow:hover {
            background-color: #e5a71a;
            color: #1a1a1a;
            transform: translateY(-2px);
        }

        .social-pill-btn {
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #fff;
            transition: opacity 0.2s;
        }
        .social-pill-btn:hover {
            opacity: 0.85;
            color: #fff;
        }
        .bg-behance { background-color: #053eff; }
        .bg-dribbble { background-color: #ea4c89; }
        .bg-instagram { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
        .bg-linkedin { background-color: #0077b5; }
    </style>
</head>
<body>

    <!-- Top Navigation Header -->
    <header class="portfolio-nav">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('pelanggan.show', $pelanggan->pelanggan_id) }}" class="nav-logo">
                <span class="nav-logo-circle"></span>
                <span>{{ strtoupper($pelanggan->last_name ?: 'NIMBUS') }}</span>
            </a>

            <nav class="d-none d-md-flex align-items-center gap-2">
                <a href="#hero" class="nav-link active">Home</a>
                <a href="#about" class="nav-link">About</a>
                <a href="{{ route('pelanggan.index') }}" class="nav-link text-primary"><i class="fa-solid fa-arrow-left me-1"></i> Data Pelanggan</a>
            </nav>

            <div class="d-flex align-items-center gap-3">
                <div class="d-none d-sm-flex align-items-center gap-2 text-muted">
                    @if($pelanggan->behance_url)
                        <a href="{{ str_starts_with($pelanggan->behance_url, 'http') ? $pelanggan->behance_url : 'https://' . $pelanggan->behance_url }}" target="_blank" class="text-dark"><i class="fa-brands fa-behance"></i></a>
                    @endif
                    @if($pelanggan->dribbble_url)
                        <a href="{{ str_starts_with($pelanggan->dribbble_url, 'http') ? $pelanggan->dribbble_url : 'https://' . $pelanggan->dribbble_url }}" target="_blank" class="text-dark"><i class="fa-brands fa-dribbble"></i></a>
                    @endif
                    @if($pelanggan->instagram_url)
                        <a href="{{ str_starts_with($pelanggan->instagram_url, 'http') ? $pelanggan->instagram_url : 'https://' . $pelanggan->instagram_url }}" target="_blank" class="text-dark"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                    @if($pelanggan->linkedin_url)
                        <a href="{{ str_starts_with($pelanggan->linkedin_url, 'http') ? $pelanggan->linkedin_url : 'https://' . $pelanggan->linkedin_url }}" target="_blank" class="text-dark"><i class="fa-brands fa-linkedin-in"></i></a>
                    @endif
                </div>
                <a href="mailto:{{ $pelanggan->email }}" class="btn-black btn-sm">Contact Me</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <!-- Blobs in background -->
        <div class="blob-yellow-hero d-none d-lg-block"></div>
        <div class="blob-dark-pattern d-none d-md-block"></div>

        <div class="container hero-content">
            <div class="row align-items-center">
                <!-- Left text column -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="hero-watermark handwritten">{{ $pelanggan->first_name }}</div>
                    <h1 class="hero-title">
                        Hi! I'm {{ $pelanggan->first_name }} {{ $pelanggan->last_name }} <span class="text-muted">-</span>
                    </h1>
                    <h2 class="hero-subtitle">
                        {{ $pelanggan->title ?: 'UI/UX Designer & Creative Specialist' }}
                    </h2>

                    <p class="hero-bio">
                        {{ $pelanggan->bio ?: 'Product Designer and Digital Creative Director working in design field with specialized experience in UI/UX, Branding and digital design systems.' }}
                    </p>

                    <div class="meta-info-box">
                        <div class="meta-item">
                            <div class="meta-label">Email:</div>
                            <div class="meta-value">{{ $pelanggan->email }}</div>
                        </div>
                        @if($pelanggan->phone)
                        <div class="meta-item">
                            <div class="meta-label">Phone:</div>
                            <div class="meta-value">{{ $pelanggan->phone }}</div>
                        </div>
                        @endif
                        @if($pelanggan->behance_url)
                        <div class="meta-item">
                            <div class="meta-label">Behance:</div>
                            <div class="meta-value">{{ $pelanggan->behance_url }}</div>
                        </div>
                        @endif
                        @if($pelanggan->address)
                        <div class="meta-item">
                            <div class="meta-label">Location:</div>
                            <div class="meta-value">{{ $pelanggan->address }}</div>
                        </div>
                        @endif
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        @if($pelanggan->cv_file)
                            <a href="{{ asset('storage/' . $pelanggan->cv_file) }}" target="_blank" class="btn-yellow">
                                <i class="fa-solid fa-download"></i> Download CV
                            </a>
                        @else
                            <a href="mailto:{{ $pelanggan->email }}" class="btn-yellow">
                                <i class="fa-solid fa-envelope"></i> Send Email
                            </a>
                        @endif
                        <a href="{{ route('pelanggan.edit', $pelanggan->pelanggan_id) }}" class="btn-black">
                            <i class="fa-solid fa-pen-to-square"></i> Edit Portofolio
                        </a>
                    </div>
                </div>

                <!-- Right profile image column -->
                <div class="col-lg-6 hero-image-wrapper">
                    @if($pelanggan->profile_image)
                        <img src="{{ asset('storage/' . $pelanggan->profile_image) }}" alt="{{ $pelanggan->first_name }}" class="hero-profile-img img-fluid">
                    @elseif($pelanggan->banner_image)
                        <img src="{{ asset('storage/' . $pelanggan->banner_image) }}" alt="{{ $pelanggan->first_name }}" class="hero-profile-img img-fluid">
                    @else
                        <div class="hero-profile-placeholder d-flex flex-column align-items-center justify-content-center text-center p-4">
                            <div class="rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center fw-bold mb-3 shadow-sm" style="width: 110px; height: 110px; font-size: 3rem;">
                                {{ strtoupper(substr($pelanggan->first_name, 0, 1)) }}
                            </div>
                            <h4 class="fw-bold mb-1">{{ $pelanggan->first_name }} {{ $pelanggan->last_name }}</h4>
                            <p class="text-muted small mb-3">Belum ada foto profil yang diunggah</p>
                            <a href="{{ route('pelanggan.edit', $pelanggan->pelanggan_id) }}" class="btn btn-sm btn-dark">
                                <i class="fa-solid fa-camera me-1"></i> Upload Foto
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Pill Badges Section -->
    <section class="pill-features">
        <div class="container">
            <div class="row g-3">
                @php
                    $servicesList = [];
                    if (!empty($pelanggan->services)) {
                        $servicesList = array_map('trim', explode(',', $pelanggan->services));
                    }
                    if (empty($servicesList)) {
                        $servicesList = ['UI/UX Designer', 'Photographer', 'Freelancer'];
                    }
                @endphp

                @foreach($servicesList as $index => $srv)
                    @php
                        $bgIcon = ($index % 3 == 0) ? 'bg-dark text-white' : (($index % 3 == 1) ? 'bg-warning text-dark' : 'bg-light text-dark border');
                    @endphp
                    <div class="col-md-4">
                        <div class="feature-card-pill">
                            <div class="d-flex align-items-center">
                                <div class="icon-bubble {{ $bgIcon }}">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $srv }}</h6>
                                    <small class="text-muted">Available for projects</small>
                                </div>
                            </div>
                            <span class="text-muted"><i class="fa-solid fa-chevron-right"></i></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section ("Hi There! & Need Creative Design?") -->
    <section id="about" class="about-section">
        <div class="blob-yellow-secondary d-none d-lg-block"></div>
        <div class="container position-relative" style="z-index: 5;">
            <div class="row align-items-center">
                <!-- Secondary image with handwritten greeting -->
                <div class="col-lg-5 mb-5 mb-lg-0 secondary-img-wrapper text-center">
                    <div class="position-relative d-inline-block">
                        <div class="position-absolute top-0 start-0 translate-middle handwritten" style="font-size: 3.5rem; color: #111; z-index: 10; line-height: 1;">
                            Hi<br>There!
                        </div>
                        @if($pelanggan->banner_image)
                            <img src="{{ asset('storage/' . $pelanggan->banner_image) }}" alt="Banner" class="secondary-img img-fluid">
                        @elseif($pelanggan->profile_image)
                            <img src="{{ asset('storage/' . $pelanggan->profile_image) }}" alt="Banner" class="secondary-img img-fluid">
                        @else
                            <div class="secondary-img-placeholder d-flex flex-column align-items-center justify-content-center text-center p-4">
                                <i class="fa-regular fa-image text-muted mb-2" style="font-size: 3rem;"></i>
                                <span class="text-muted small">Belum ada foto banner / sekunder</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- About description -->
                <div class="col-lg-7 ps-lg-5">
                    <span class="section-label-vertical">About Me</span>
                    <h2 class="section-heading-bold">Need Creative Design?<br>I can Help You!</h2>
                    <p class="text-muted mb-4" style="line-height: 1.8; font-size: 1.05rem;">
                        {{ $pelanggan->about ?: 'Product Designer and Digital Creative Director working in design field with proven experience in UI/UX, branding and digital visual assets. These are the words we live by in everything we do. Every story we tell, every brand we build, and every interaction we create must not only look beautiful, but deliver impactful results.' }}
                    </p>

                    <h6 class="fw-bold mb-3">You Can Follow Me Here:</h6>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        @if($pelanggan->behance_url)
                            <a href="{{ str_starts_with($pelanggan->behance_url, 'http') ? $pelanggan->behance_url : 'https://' . $pelanggan->behance_url }}" target="_blank" class="social-pill-btn bg-behance">
                                <i class="fa-brands fa-behance"></i> Behance
                            </a>
                        @endif
                        @if($pelanggan->dribbble_url)
                            <a href="{{ str_starts_with($pelanggan->dribbble_url, 'http') ? $pelanggan->dribbble_url : 'https://' . $pelanggan->dribbble_url }}" target="_blank" class="social-pill-btn bg-dribbble">
                                <i class="fa-brands fa-dribbble"></i> Dribbble
                            </a>
                        @endif
                        @if($pelanggan->instagram_url)
                            <a href="{{ str_starts_with($pelanggan->instagram_url, 'http') ? $pelanggan->instagram_url : 'https://' . $pelanggan->instagram_url }}" target="_blank" class="social-pill-btn bg-instagram">
                                <i class="fa-brands fa-instagram"></i> Instagram
                            </a>
                        @endif
                        @if($pelanggan->linkedin_url)
                            <a href="{{ str_starts_with($pelanggan->linkedin_url, 'http') ? $pelanggan->linkedin_url : 'https://' . $pelanggan->linkedin_url }}" target="_blank" class="social-pill-btn bg-linkedin">
                                <i class="fa-brands fa-linkedin-in"></i> LinkedIn
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container d-flex flex-wrap justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <span class="nav-logo-circle"></span>
                <span class="fw-bold">{{ $pelanggan->first_name }} {{ $pelanggan->last_name }}</span>
                <span class="text-muted ms-2 small">© {{ date('Y') }} All Rights Reserved.</span>
            </div>
            <div>
                <a href="{{ route('pelanggan.index') }}" class="text-warning small text-decoration-none">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard Admin Pelanggan
                </a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
