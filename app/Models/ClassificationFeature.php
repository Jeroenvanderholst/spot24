<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassificationFeature extends Model
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
        'classification_feature_name',
        'classification_feature_value1',
        'classification_feature_value2',
        'classification_feature_uni',
        'other_classification_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'other_classification_id' => 'integer',
    ];

    public function otherClassification(): BelongsTo
    {
        return $this->belongsTo(OtherClassification::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(OtherClassificationProductId::class);
    }
}
