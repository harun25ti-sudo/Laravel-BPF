<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'email' => 'required|email|unique:pelanggan,email',
            'phone' => 'nullable|string|max:20',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'about' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'behance_url' => 'nullable|string|max:255',
            'dribbble_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'services' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('pelanggan/profiles', 'public');
        }

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('pelanggan/banners', 'public');
        }

        if ($request->hasFile('cv_file')) {
            $validated['cv_file'] = $request->file('cv_file')->store('pelanggan/cvs', 'public');
        }

        Pelanggan::create($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource (Halaman Portofolio).
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $allPelanggan = Pelanggan::all(); // untuk tabel data di bagian bawah portofolio
        return view('admin.pelanggan.portfolio', compact('pelanggan', 'allPelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataPelanggan'] = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'email' => 'required|email|unique:pelanggan,email,' . $id . ',pelanggan_id',
            'phone' => 'nullable|string|max:20',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'about' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'behance_url' => 'nullable|string|max:255',
            'dribbble_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'services' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('profile_image')) {
            if ($pelanggan->profile_image && Storage::disk('public')->exists($pelanggan->profile_image)) {
                Storage::disk('public')->delete($pelanggan->profile_image);
            }
            $validated['profile_image'] = $request->file('profile_image')->store('pelanggan/profiles', 'public');
        }

        if ($request->hasFile('banner_image')) {
            if ($pelanggan->banner_image && Storage::disk('public')->exists($pelanggan->banner_image)) {
                Storage::disk('public')->delete($pelanggan->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('pelanggan/banners', 'public');
        }

        if ($request->hasFile('cv_file')) {
            if ($pelanggan->cv_file && Storage::disk('public')->exists($pelanggan->cv_file)) {
                Storage::disk('public')->delete($pelanggan->cv_file);
            }
            $validated['cv_file'] = $request->file('cv_file')->store('pelanggan/cvs', 'public');
        }

        $pelanggan->update($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        if ($pelanggan->profile_image && Storage::disk('public')->exists($pelanggan->profile_image)) {
            Storage::disk('public')->delete($pelanggan->profile_image);
        }
        if ($pelanggan->banner_image && Storage::disk('public')->exists($pelanggan->banner_image)) {
            Storage::disk('public')->delete($pelanggan->banner_image);
        }
        if ($pelanggan->cv_file && Storage::disk('public')->exists($pelanggan->cv_file)) {
            Storage::disk('public')->delete($pelanggan->cv_file);
        }

        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus');
    }
}
