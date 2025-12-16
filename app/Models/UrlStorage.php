<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlStorage extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'original_url',
        'shortened_url',
        'click_count',
    ];
    public $incrementing = false;
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
