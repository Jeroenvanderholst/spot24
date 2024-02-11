<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Price extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trade_item_id',
        'supplier_item_number',
        'price_unit',
        'price_unit_factor',
        'price_quantity',
        'price_on_request',
        'gross_list_pricec',
        'net_price',
        'recommended_retail_price',
        'vat',
        'price_validity_date',
        'price_expiry_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trade_item_id' => 'integer',
        'price_unit_factor' => 'decimal:4',
        'price_quantity' => 'decimal:4',
        'price_on_request' => 'boolean',
        'gross_list_pricec' => 'decimal:4',
        'net_price' => 'decimal:4',
        'recommended_retail_price' => 'decimal:4',
        'vat' => 'decimal:2',
        'price_validity_date' => 'date',
        'price_expiry_date' => 'date',
    ];

    public function tradeItem(): BelongsTo
    {
        return $this->belongsTo(TradeItem::class);
    }

    public function allowanceSurcharges(): HasMany
    {
        return $this->hasMany(AllowanceSurcharge::class);
    }
}
