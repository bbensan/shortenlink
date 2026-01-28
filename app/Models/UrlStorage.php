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
        'creator_ip',
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function findExistingUrl($userId, $creatorIp, $originalUrl, $isTemporary)
    {
        return self::where('user_id', $userId)
            ->where('creator_ip', $creatorIp)
            ->where('original_url', $originalUrl)
            ->where('is_temporary', $isTemporary)
            ->first();
    }
}
