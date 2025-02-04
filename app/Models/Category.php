<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Указываем все поля из таблицы, кроме id, created_at и updated_at
    protected $fillable = [
        'name',
    ];

    // Связь 1:M к модели Product
    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }
}
