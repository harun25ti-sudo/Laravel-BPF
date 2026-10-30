<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata1083 extends Model
{
    use HasFactory;

    // Menentukan nama tabel sesuai ketentuan NIM
    protected $table = 'biodata_1083';

    // Primary key default adalah id
    protected $primaryKey = 'id';

    // Kolom-kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'nama',
        'username',
        'nim',
        'jurusan',
        'tanggal_lahir',
        'gender',
        'email',
        'alamat',
        'foto_profil',
        'banner_profil',
        'catatan_status',
        'bio',
        'instansi',
        'link_website',
    ];

    // Relasi ke postingan (One to Many)
    public function posts()
    {
        return $this->hasMany(Post1083::class, 'biodata_id', 'id')->latest();
    }

    // Relasi ke stories / sorotan (One to Many)
    public function stories()
    {
        return $this->hasMany(Story1083::class, 'biodata_id', 'id')->latest();
    }
}
