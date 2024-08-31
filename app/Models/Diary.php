<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $isExisting = Diary::whereDate('created_at', now())->exists();

            if ($isExisting) {
                return false;
            }
        });
    }
}
