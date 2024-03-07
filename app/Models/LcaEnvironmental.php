<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LcaEnvironmental extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'manufacturer_product_number',
        'declared_unit_unit',
        'declared_unit_quantity',
        'functional_unit_description',
        'lca_reference_lifetime',
        'third_party_verification',
        'manufacturer_product_gtin',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'declared_unit_quantity' => 'decimal:4',
        'functional_unit_description' => 'array',
        'lca_reference_lifetime' => 'integer',
    ];


    public function lcaDeclarations(): HasMany
    {
        return $this->hasMany(LcaDeclaration::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
