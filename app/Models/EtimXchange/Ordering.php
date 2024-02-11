<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ordering extends Model
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
        'order_unit',
        'minimum_order_quantity',
        'order_step_size',
        'standard_order_lead_time',
        'use_unit',
        'use_unit_conversion_factor',
        'single_use_unit_quantity',
        'alternative_use_unit',
        'alternative_use_unit_conversion_factor',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trade_item_id' => 'integer',
        'minimum_order_quantity' => 'decimal:4',
        'order_step_size' => 'decimal:4',
        'standard_order_lead_time' => 'integer',
        'use_unit_conversion_factor' => 'decimal:4',
        'single_use_unit_quantity' => 'decimal:4',
        'alternative_use_unit_conversion_factor' => 'decimal:4',
    ];

    public function tradeItem(): HasOne
    {
        return $this->hasOne(TradeItem::class);
    }

    public function tradeItem(): BelongsTo
    {
        return $this->belongsTo(TradeItem::class);
    }
}
