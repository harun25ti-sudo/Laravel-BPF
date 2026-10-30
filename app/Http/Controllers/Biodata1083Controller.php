<?php

namespace App\Http\Controllers;

use App\Models\Biodata1083;
use App\Models\Post1083;
use App\Models\Story1083;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Biodata1083Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataBiodata'] = Biodata1083::latest()->get();
        return view('admin.biodata1083.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.biodata1083.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:100',
            'username'      => 'nullable|string|max:50',
            'nim'           => 'required|numeric|unique:biodata_1083,nim',
            'jurusan'       => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'gender'        => 'required|in:Male,Female',
            'email'         => 'required|email|unique:biodata_1083,email',
            'alamat'        => 'required|string',
            'foto_profil'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'catatan_status'=> 'nullable|string|max:100',
            'bio'           => 'nullable|string',
            'instansi'      => 'nullable|string|max:100',
            'link_website'  => 'nullable|string|max:150',
        ], [
            'nama.required'          => 'Nama lengkap wajib diisi!',
            'nim.required'           => 'NIM wajib diisi!',
            'nim.unique'             => 'NIM sudah terdaftar!',
            'jurusan.required'       => 'Jurusan wajib diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi!',
            'gender.required'        => 'Jenis kelamin wajib dipilih!',
            'email.required'         => 'Email wajib diisi!',
            'email.email'            => 'Format email tidak valid!',
            'email.unique'           => 'Email sudah terdaftar!',
            'alamat.required'        => 'Alamat wajib diisi!',
            'foto_profil.image'      => 'File foto profil harus berupa gambar!',
            'banner_profil.image'    => 'File banner profil harus berupa gambar!',
        ]);

        $data = [
            'nama'           => $request->nama,
            'username'       => $request->username ?: strtolower(str_replace(' ', '_', $request->nama)),
            'nim'            => $request->nim,
            'jurusan'        => $request->jurusan,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'gender'         => $request->gender,
            'email'          => $request->email,
            'alamat'         => $request->alamat,
            'catatan_status' => $request->catatan_status,
            'bio'            => $request->bio,
            'instansi'       => $request->instansi ?: 'POLITEKNIK CALTEX RIAU',
            'link_website'   => $request->link_website,
        ];

        // Handle upload foto profil
        if ($request->hasFile('foto_profil')) {
            $fotoPath = $request->file('foto_profil')->store('foto_biodata', 'public');
            $data['foto_profil'] = $fotoPath;
        }

        // Handle upload banner profil
        if ($request->hasFile('banner_profil')) {
            $bannerPath = $request->file('banner_profil')->store('banner_biodata', 'public');
            $data['banner_profil'] = $bannerPath;
        }

        Biodata1083::create($data);

        return redirect()->route('biodata1083.index')->with('success', 'Penambahan Data Biodata Berhasil!');
    }

    /**
     * Display the specified resource (Halaman Detail Akun Instagram Style).
     */
    public function show(string $id)
    {
        $biodata = Biodata1083::with(['posts', 'stories'])->findOrFail($id);
        return view('admin.biodata1083.show', compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataBiodata'] = Biodata1083::findOrFail($id);
        return view('admin.biodata1083.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $biodata = Biodata1083::findOrFail($id);

        $request->validate([
            'nama'          => 'required|string|max:100',
            'username'      => 'nullable|string|max:50',
            'nim'           => 'required|numeric|unique:biodata_1083,nim,' . $biodata->id,
            'jurusan'       => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'gender'        => 'required|in:Male,Female',
            'email'         => 'required|email|unique:biodata_1083,email,' . $biodata->id,
            'alamat'        => 'required|string',
            'foto_profil'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'catatan_status'=> 'nullable|string|max:100',
            'bio'           => 'nullable|string',
            'instansi'      => 'nullable|string|max:100',
            'link_website'  => 'nullable|string|max:150',
            // Input tambahan postingan baru di form edit
            'foto_post'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'caption_post'  => 'nullable|string',
            // Input tambahan story / sorotan di form edit
            'foto_story'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'judul_sorotan' => 'nullable|string|max:50',
        ], [
            'nama.required'          => 'Nama lengkap wajib diisi!',
            'nim.required'           => 'NIM wajib diisi!',
            'nim.unique'             => 'NIM sudah terdaftar!',
            'jurusan.required'       => 'Jurusan wajib diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi!',
            'gender.required'        => 'Jenis kelamin wajib dipilih!',
            'email.required'         => 'Email wajib diisi!',
            'email.email'            => 'Format email tidak valid!',
            'email.unique'           => 'Email sudah terdaftar!',
            'alamat.required'        => 'Alamat wajib diisi!',
        ]);

        $biodata->nama           = $request->nama;
        $biodata->username       = $request->username ?: ($biodata->username ?: strtolower(str_replace(' ', '_', $request->nama)));
        $biodata->nim            = $request->nim;
        $biodata->jurusan        = $request->jurusan;
        $biodata->tanggal_lahir  = $request->tanggal_lahir;
        $biodata->gender         = $request->gender;
        $biodata->email          = $request->email;
        $biodata->alamat         = $request->alamat;
        $biodata->catatan_status = $request->catatan_status;
        $biodata->bio            = $request->bio;
        $biodata->instansi       = $request->instansi;
        $biodata->link_website   = $request->link_website;

        // Cek jika user upload foto profil baru
        if ($request->hasFile('foto_profil')) {
            if ($biodata->foto_profil && Storage::disk('public')->exists($biodata->foto_profil)) {
                Storage::disk('public')->delete($biodata->foto_profil);
            }
            $biodata->foto_profil = $request->file('foto_profil')->store('foto_biodata', 'public');
        }

        // Cek jika user upload banner baru
        if ($request->hasFile('banner_profil')) {
            if ($biodata->banner_profil && Storage::disk('public')->exists($biodata->banner_profil)) {
                Storage::disk('public')->delete($biodata->banner_profil);
            }
            $biodata->banner_profil = $request->file('banner_profil')->store('banner_biodata', 'public');
        }

        $biodata->save();

        // Tambah Postingan Baru jika user mengupload foto_post di form edit
        if ($request->hasFile('foto_post')) {
            $postPath = $request->file('foto_post')->store('posts_biodata', 'public');
            Post1083::create([
                'biodata_id'  => $biodata->id,
                'foto_post'   => $postPath,
                'caption'     => $request->caption_post,
                'lokasi'      => $request->lokasi_post ?: 'Pekanbaru, Riau',
                'jumlah_like' => rand(12, 185), // auto dummy likes biar interaktif
            ]);
        }

        // Tambah Story/Sorotan Baru jika user mengupload foto_story di form edit
        if ($request->hasFile('foto_story')) {
            $storyPath = $request->file('foto_story')->store('stories_biodata', 'public');
            Story1083::create([
                'biodata_id'    => $biodata->id,
                'judul_sorotan' => $request->judul_sorotan ?: 'Baru',
                'foto_story'    => $storyPath,
            ]);
        }

        // Kembali ke daftar biodata sesuai instruksi
        return redirect()->route('biodata1083.index')->with('success', 'Perubahan Data Akun & Profil Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $biodata = Biodata1083::findOrFail($id);

        if ($biodata->foto_profil && Storage::disk('public')->exists($biodata->foto_profil)) {
            Storage::disk('public')->delete($biodata->foto_profil);
        }

        if ($biodata->banner_profil && Storage::disk('public')->exists($biodata->banner_profil)) {
            Storage::disk('public')->delete($biodata->banner_profil);
        }

        // Hapus file postingan
        foreach ($biodata->posts as $post) {
            if ($post->foto_post && Storage::disk('public')->exists($post->foto_post)) {
                Storage::disk('public')->delete($post->foto_post);
            }
        }

        // Hapus file story
        foreach ($biodata->stories as $story) {
            if ($story->foto_story && Storage::disk('public')->exists($story->foto_story)) {
                Storage::disk('public')->delete($story->foto_story);
            }
        }

        $biodata->delete();

        return redirect()->route('biodata1083.index')->with('success', 'Penghapusan Data Biodata Berhasil!');
    }
}
