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

    public function skus(): HasMany
    {
        return $this->hasMany(AttributeSku::class, 'attribute_id');
    }
}
