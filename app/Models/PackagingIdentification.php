<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PackagingIdentification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trade_item_id',
        'supplier_packaging_number',
        'manufacturer_packaging_number',
        'packaging_gtin',
        'packaging_type_code',
        'packaging_quantity',
        'trade_item_primary_packaging',
        'packaging_gs1_code128',
        'packaging_recyclable',
        'packaging_reusable',
        'packaging_break',
        'number_of_packaging_parts',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trade_item_id' => 'integer',
        'packaging_gtin' => 'array',
        'packaging_quantity' => 'decimal:4',
        'trade_item_primary_packaging' => 'boolean',
        'packaging_recyclable' => 'boolean',
        'packaging_reusable' => 'boolean',
        'packaging_break' => 'boolean',
        'number_of_packaging_parts' => 'integer',
    ];

    public function enclosedTradeItems(): HasMany
    {
        return $this->hasMany(EnclosedTradeItem::class);
    }

    public function packagingDetails(): HasMany
    {
        return $this->hasMany(PackagingDetail::class);
    }

    public function tradeItem(): BelongsTo
    {
        return $this->belongsTo(TradeItem::class);
    }
}
