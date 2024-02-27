<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnclosedTradeItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'packaging_id',
        'supplier_item_number',
        'manufacturer_item_number',
        'item_gtin',
        'enclosed_item_quantity',
        'packaging_identification_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'packaging_id' => 'integer',
        'item_gtin' => 'array',
        'enclosed_item_quantity' => 'integer',
        'packaging_identification_id' => 'integer',
    ];

    public function packagingIdentification(): BelongsTo
    {
        return $this->belongsTo(PackagingIdentification::class);
    }

    public function packaging(): BelongsTo
    {
        return $this->belongsTo(PackagingIdentification::class);
    }
}
