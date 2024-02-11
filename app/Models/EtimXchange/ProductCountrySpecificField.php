<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCountrySpecificField extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'product_number',
        'cs_product_characteristic_code',
        'cs_product_characteristic_name',
        'cs_product_characteristic_value_boolean',
        'cs_product_characteristic_value_numeric',
        'cs_product_characteristic_value_range_lower',
        'cs_product_characteristic_value_range_upper',
        'cs_product_characteristic_value_string',
        'cs_product_characteristic_value_set',
        'cs_product_characteristic_value_select',
        'cs_product_characteristic_value_unit_code',
        'cs_product_characteristic_reference_gtin',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'cs_product_characteristic_name' => 'array',
        'cs_product_characteristic_value_boolean' => 'boolean',
        'cs_product_characteristic_value_numeric' => 'decimal:4',
        'cs_product_characteristic_value_range_lower' => 'decimal:4',
        'cs_product_characteristic_value_range_upper' => 'decimal:4',
        'cs_product_characteristic_value_string' => 'array',
        'cs_product_characteristic_value_set' => 'array',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
