<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story1083 extends Model
{
    use HasFactory;

    protected $table = 'stories_1083';

    protected $fillable = [
        'biodata_id',
        'judul_sorotan',
        'foto_story',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata1083::class, 'biodata_id', 'id');
    }
}
