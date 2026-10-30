<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'pelanggan_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
        'profile_image',
        'banner_image',
        'title',
        'bio',
        'about',
        'address',
        'behance_url',
        'dribbble_url',
        'instagram_url',
        'linkedin_url',
        'cv_file',
        'skills',
        'services',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
