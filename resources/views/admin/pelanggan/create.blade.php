@extends('layouts.admin.app')

@section('content')
<div class="py-4">
<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
<li class="breadcrumb-item">
<a href="#">
<svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
</path>
</svg>
</a>
</li>
<li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
<li class="breadcrumb-item active" aria-current="page">Tambah Pelanggan</li>
</ol>
</nav>
<div class="d-flex justify-content-between w-100 flex-wrap">
<div class="mb-3 mb-lg-0">
<h1 class="h4">Tambah Pelanggan</h1>
<p class="mb-0">Form untuk menambahkan data pelanggan dan profil portofolio.</p>
</div>
<div>
<a href="{{ route('pelanggan.index') }}" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
Kembali
</a>
</div>
</div>
</div>

<div class="row">
<div class="col-12 mb-4">
<div class="card border-0 shadow components-section">
<div class="card-body">
<form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row mb-4">
<div class="col-12"><h5 class="mb-3 border-bottom pb-2">Informasi Dasar Pelanggan</h5></div>
<div class="col-lg-4 col-sm-6">
<div class="mb-3">
<label for="first_name">First Name <span class="text-danger">*</span></label>
<input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}">
@error('first_name')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="last_name">Last Name <span class="text-danger">*</span></label>
<input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}">
@error('last_name')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="mb-3">
<label for="birthday">Birthday</label>
<div class="input-group">
<span class="input-group-text">
<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
</span>
<input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}">
@error('birthday')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
<div class="mb-3">
<label for="gender">Gender</label>
<select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
<option value="">Pilih Gender</option>
<option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
<option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
<option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
</select>
@error('gender')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-lg-4 col-sm-12">
<div class="mb-3">
<label for="email">Email <span class="text-danger">*</span></label>
<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
@error('email')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="phone">Phone</label>
<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
@error('phone')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-12"><h5 class="mb-3 mt-3 border-bottom pb-2">Data Portofolio & Pekerjaan</h5></div>
<div class="col-md-6 mb-3">
    <label for="title" class="form-label">Profesi / Title</label>
    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: Product Designer, UI/UX Expert" value="{{ old('title') }}">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="address" class="form-label">Lokasi / Alamat</label>
    <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Contoh: Riau, Indonesia" value="{{ old('address') }}">
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6 mb-3">
    <label for="skills" class="form-label">Skills (Pisahkan dengan koma)</label>
    <input type="text" id="skills" name="skills" class="form-control @error('skills') is-invalid @enderror" placeholder="Figma, UI/UX, Web Design, Branding" value="{{ old('skills') }}">
    @error('skills')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="services" class="form-label">Services / Layanan (Pisahkan dengan koma)</label>
    <input type="text" id="services" name="services" class="form-control @error('services') is-invalid @enderror" placeholder="Website Design, Mobile App Design, Brand Identity" value="{{ old('services') }}">
    @error('services')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-12"><h5 class="mb-3 mt-3 border-bottom pb-2">Foto & Dokumen CV</h5></div>
<div class="col-md-6 mb-3">
    <label for="profile_image" class="form-label">Foto Profil Utama</label>
    <input type="file" id="profile_image" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror" accept="image/*">
    <div class="form-text">Format: JPG, PNG, WEBP (Max 4MB). Disarankan foto portrait seperti referensi.</div>
    @error('profile_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="banner_image" class="form-label">Banner Image / Foto Sekunder</label>
    <input type="file" id="banner_image" name="banner_image" class="form-control @error('banner_image') is-invalid @enderror" accept="image/*">
    <div class="form-text">Foto pose tambahan untuk bagian "Hi There!" atau banner profil.</div>
    @error('banner_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-12"><h5 class="mb-3 mt-3 border-bottom pb-2">Deskripsi & Tautan Sosial Media</h5></div>
<div class="col-md-6 mb-3">
    <label for="bio" class="form-label">Bio Singkat (Hero Section)</label>
    <textarea id="bio" name="bio" rows="3" class="form-control @error('bio') is-invalid @enderror" placeholder="Deskripsi singkat yang tampil di header atas...">{{ old('bio') }}</textarea>
    @error('bio')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="about" class="form-label">Tentang Saya (Need Creative Design?)</label>
    <textarea id="about" name="about" rows="3" class="form-control @error('about') is-invalid @enderror" placeholder="Deskripsi lengkap layanan, pengalaman, dll...">{{ old('about') }}</textarea>
    @error('about')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-3 col-sm-6 mb-3">
    <label for="behance_url" class="form-label">Behance URL / Username</label>
    <input type="text" id="behance_url" name="behance_url" class="form-control @error('behance_url') is-invalid @enderror" placeholder="behance.net/username" value="{{ old('behance_url') }}">
    @error('behance_url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-3 col-sm-6 mb-3">
    <label for="dribbble_url" class="form-label">Dribbble URL</label>
    <input type="text" id="dribbble_url" name="dribbble_url" class="form-control @error('dribbble_url') is-invalid @enderror" placeholder="dribbble.com/username" value="{{ old('dribbble_url') }}">
    @error('dribbble_url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-3 col-sm-6 mb-3">
    <label for="instagram_url" class="form-label">Instagram URL</label>
    <input type="text" id="instagram_url" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" placeholder="instagram.com/username" value="{{ old('instagram_url') }}">
    @error('instagram_url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-3 col-sm-6 mb-3">
    <label for="linkedin_url" class="form-label">LinkedIn URL</label>
    <input type="text" id="linkedin_url" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" placeholder="linkedin.com/in/username" value="{{ old('linkedin_url') }}">
    @error('linkedin_url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
</div>

<div class="row">
<div class="col-12">
<button type="submit" class="btn btn-primary">Simpan Pelanggan & Portofolio</button>
<a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
