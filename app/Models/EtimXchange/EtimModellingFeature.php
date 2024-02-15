<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EtimModellingFeature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'etim_modelling_port_id',
        'product_id',
        'etim_modelling_class_code',
        'etim_modelling_portcode',
        'etim_feature_code',
        'etim_value_code',
        'etim_value_numeric',
        'etim_value_range_lower',
        'etim_value_range_upper',
        'etim_value_logical',
        'etim_value_coordinate_x',
        'etim_value_coordinate_y',
        'etim_value_coordinate_z',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'etim_modelling_port_id' => 'integer',
        'product_id' => 'integer',
        'etim_modelling_portcode' => 'integer',
        'etim_value_numeric' => 'decimal:4',
        'etim_value_range_lower' => 'decimal:4',
        'etim_value_range_upper' => 'decimal:4',
        'etim_value_logical' => 'boolean',
        'etim_value_coordinate_x' => 'decimal:4',
        'etim_value_coordinate_y' => 'decimal:4',
        'etim_value_coordinate_z' => 'decimal:4',
    ];


    public function etimmodellingport(): BelongsTo
    {
        return $this->belongsTo(EtimModellingPort::class, 'product_id');
    }

    public function etimValueMatrices(): HasMany
    {
        return $this->hasMany(EtimValueMatrix::class);
    }
}
