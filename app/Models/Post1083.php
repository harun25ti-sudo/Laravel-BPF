<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post1083 extends Model
{
    use HasFactory;

    protected $table = 'posts_1083';

    protected $fillable = [
        'biodata_id',
        'foto_post',
        'caption',
        'lokasi',
        'jumlah_like',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata1083::class, 'biodata_id', 'id');
    }
}
