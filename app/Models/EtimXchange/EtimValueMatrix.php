<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EtimValueMatrix extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'etim_modelling_feature_id',
        'etim_modelling_class_id',
        'etim_feature_id',
        'etim_value_matrix_source',
        'etim_value_matrix_result',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'etim_modelling_feature_id' => 'integer',
        'etim_value_matrix_source' => 'decimal:4',
        'etim_value_matrix_result' => 'decimal:4',
    ];

    public function etimModellingFeature(): BelongsTo
    {
        return $this->belongsTo(EtimModellingFeature::class);
    }

}
