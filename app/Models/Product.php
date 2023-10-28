<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'description',
        'information',
        'quantity',
        'price',
        'weight',
        'category_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'average_rating',
    ];

    /**
     * Get the category associated with the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the reviews associated with the product.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the order items associated with the product.
     */
    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the product's average rating.
     */
    protected function averageRating(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->reviews()->average('rating'), 2),
        );
    }

    /**
     * Get the product's image.
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => asset($value),
        );
    }
}
