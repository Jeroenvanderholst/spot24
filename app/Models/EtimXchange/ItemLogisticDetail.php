<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemLogisticDetail extends Model
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
        'base_item_net_length',
        'base_item_net_width',
        'base_item_net_height',
        'base_item_net_diameter',
        'net_dimension_unit',
        'base_item_net_weight',
        'net_weight_unit',
        'base_item_net_volume',
        'net_volume_unit',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trade_item_id' => 'integer',
        'base_item_net_length' => 'decimal:4',
        'base_item_net_width' => 'decimal:4',
        'base_item_net_height' => 'decimal:4',
        'base_item_net_diameter' => 'decimal:4',
        'base_item_net_weight' => 'decimal:4',
        'base_item_net_volume' => 'decimal:4',
    ];

    public function tradeItem(): BelongsTo
    {
        return $this->belongsTo(TradeItem::class);
    }
}
