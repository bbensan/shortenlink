<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlStorage extends Model
{
    use HasFactory, HasUuids;
    
    protected $table = 'url_storages';
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    protected $fillable = [
        'original_url',
        'shortened_url',
        'click_count',
        'user_id',
        'is_temporary',
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
