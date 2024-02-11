<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Legislation extends Model
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
        'electric_component_contained',
        'battery_contained',
        'weee_category',
        'rohs_indicator',
        'ce_marking',
        'sds_indicatobigintr',
        'reach_indicator',
        'reach_date',
        'scip_number',
        'ufi_code',
        'un_number',
        'hazard_class',
        'adr_category',
        'net_weight_hazardous_substances',
        'volume_hazardous_substances',
        'un_shipping_name',
        'packing_group',
        'limited_quantities',
        'excepted_quantities',
        'aggregation_state',
        'special_provision_id',
        'classification_code',
        'hazard_label',
        'environmental_hazards',
        'tunnel_code',
        'label_code',
        'signal_word',
        'hazard_statement',
        'precautionary_statement',
        'li_ion_tested',
        'lithium_amount',
        'battery_energy',
        'nos274',
        'hazard_trigger',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'electric_component_contained' => 'boolean',
        'battery_contained' => 'boolean',
        'ce_marking' => 'boolean',
        'sds_indicatobigintr' => 'boolean',
        'reach_date' => 'date',
        'hazard_class' => 'array',
        'net_weight_hazardous_substances' => 'decimal:4',
        'volume_hazardous_substances' => 'decimal:4',
        'un_shipping_name' => 'array',
        'limited_quantities' => 'boolean',
        'excepted_quantities' => 'boolean',
        'special_provision_id' => 'array',
        'hazard_label' => 'array',
        'environmental_hazards' => 'boolean',
        'label_code' => 'array',
        'hazard_statement' => 'array',
        'precautionary_statement' => 'array',
        'li_ion_tested' => 'boolean',
        'lithium_amount' => 'decimal:4',
        'battery_energy' => 'decimal:4',
        'nos274' => 'boolean',
        'hazard_trigger' => 'array',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
