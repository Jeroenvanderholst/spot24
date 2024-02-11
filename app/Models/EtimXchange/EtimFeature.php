<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EtimFeature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'etim_class_code',
        'etim_class_version',
        'etim_feature_code',
        'etim_value_code',
        'etim_value_numeric',
        'etim_value_range_lower',
        'etim_value_upper',
        'etim_value_logical',
        'etim_value_details',
        'reason_no_value',
        'etim_classification_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'etim_class_version' => 'integer',
        'etim_value_numeric' => 'decimal:4',
        'etim_value_range_lower' => 'decimal:4',
        'etim_value_upper' => 'decimal:4',
        'etim_value_logical' => 'boolean',
        'etim_value_details' => 'array',
        'etim_classification_id' => 'integer',
    ];

    public function etimClassification(): BelongsTo
    {
        return $this->belongsTo(EtimClassification::class);
    }

    public function etimclassification(): BelongsTo
    {
        return $this->belongsTo(EtimClassification::class, 'product_id', 'product_id');
    }
}
