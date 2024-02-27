<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemCountrySpecificField extends Model
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
        'cs_item_characteristic_code',
        'cs_item_characteristic_name',
        'cs_item_characteristic_value_boolean',
        'cs_item_characteristic_value_numeric',
        'cs_item_characteristic_value_range_lower',
        'cs_item_characteristic_value_range_upper',
        'cs_item_characteristic_value_string',
        'cs_item_characteristic_value_set',
        'cs_item_characteristic_value_select',
        'cs_item_characteristic_value_unit_code',
        'cs_item_characteristic_reference_gtin',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trade_item_id' => 'integer',
        'cs_item_characteristic_name' => 'array',
        'cs_item_characteristic_value_boolean' => 'boolean',
        'cs_item_characteristic_value_numeric' => 'decimal:4',
        'cs_item_characteristic_value_string' => 'array',
        'cs_item_characteristic_value_set' => 'array',
        'cs_item_characteristic_value_range_lower' => 'decimal:4',
        'cs_item_characteristic_value_range_upper' => 'decimal:4',
        'cs_item_characteristic_reference_gtin' => 'array',
    ];

    public function tradeItem(): BelongsTo
    {
        return $this->belongsTo(TradeItem::class);
    }
}
