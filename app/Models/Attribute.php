<?php

namespace App\Models;

use App\Models\AttributeSku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public const ATTRIBUTES = [
        self::SIZE,
        self::COLOUR
    ];

    public const SIZE = 'size';

    public const COLOUR = 'colour';

    public function skus(): HasMany
    {
        return $this->hasMany(AttributeSku::class, 'attribute_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeSize($query)
    {
        $query->where('name', self::SIZE);
    }

    public function scopeColour($query)
    {
        $query->where('name', self::COLOUR);
    }
}
