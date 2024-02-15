<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemRelation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trade_item_id',
        'related_supplier_item_number',
        'related_supplier_item_gtin',
        'related_manufacturer_item_number',
        'related_manufacturer_item_gtin',
        'relation_type',
        'related_item_quantity',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trade_item_id' => 'integer',
        'related_item_quantity' => 'integer',
    ];

    public function tradeItem(): BelongsTo
    {
        return $this->belongsTo(TradeItem::class);
    }

}
