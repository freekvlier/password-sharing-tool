<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Password extends Model
{
    use HasFactory;

    protected $fillable = [
        'password',
        'guid',
        'max_views',
        'view_count',
        'expiration_time'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->expiration_time) {
                $model->expiration_time = Carbon::createFromFormat('d-m-Y, H:i', $model->expiration_time)->format('Y-m-d H:i:s');
            }
        });
    }
}
