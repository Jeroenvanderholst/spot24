<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_item_number',
        'item_status',
        'item_condition',
        'stock_item',
        'shelf_life_period',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'stock_item' => 'boolean',
        'shelf_life_period' => 'integer',
    ];

    public function tradeItem(): HasOne
    {
        return $this->hasOne(TradeItem::class);
    }

    public function supplierItemNumber(): BelongsTo
    {
        return $this->belongsTo(TradeItem::class);
    }
}
