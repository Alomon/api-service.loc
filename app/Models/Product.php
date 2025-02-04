<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    // Указываем все поля из таблицы, кроме id, created_at и updated_at
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'category_id',
    ];

    // Связь M:1 к модели Category
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    // Связь 1:M к модели Photo
    public function photos(): HasMany {
        return $this->hasMany(Photo::class);
    }


}
