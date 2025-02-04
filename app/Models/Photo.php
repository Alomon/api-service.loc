<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    // Указываем все поля из таблицы, кроме id, created_at и updated_at
    protected $fillable = [
        'name',
        'product_id'
    ];

    // Связь M:1 к модели Product
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
