<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PackagingDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'packaging_id',
        'supplier_packaging_part_number',
        'manufacturer_packaging_part_number',
        'manufacturer_packaging_part_gtin',
        'packaging_type_length',
        'packaging_type_width',
        'packaging_type_height',
        'packaging_type_diameter',
        'packaging_type_dimension_unit',
        'packaging_type_weight',
        'packaging_type_weight_unit',
        'packaging_stackable',
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
        'packaging_type_length' => 'decimal:4',
        'packaging_type_width' => 'decimal:4',
        'packaging_type_height' => 'decimal:4',
        'packaging_type_diameter' => 'decimal:4',
        'packaging_type_weight' => 'decimal:4',
        'packaging_stackable' => 'integer',
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
