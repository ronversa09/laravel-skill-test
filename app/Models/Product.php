<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'image', 'user_id'];

    protected static function booted()
    {
        static::addGlobalScope('notDeleted', function (Builder $builder) {
            $builder->where('del_flag', false);
        });
    }

    public static function getAllProducts()
    {
        return Cache::remember('products', 60, function () {
            return self::all();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
