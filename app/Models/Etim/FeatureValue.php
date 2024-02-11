<?php

namespace App\Models\Etim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeatureValue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_id',
        'sort_nr',
        'feature_id',
        'value_id',
        'changecode',
        'releases',
        'class_feature_id',
        'modelling_class_feature_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sort_nr' => 'integer',
        'releases' => 'array',
        'class_feature_id' => 'integer',
        'modelling_class_feature_id' => 'integer',
    ];

    public function classFeature(): BelongsTo
    {
        return $this->belongsTo(ClassFeature::class);
    }

    public function modellingClassFeature(): BelongsTo
    {
        return $this->belongsTo(ModellingClassFeature::class);
    }

    public function modellingclassfeature(): BelongsTo
    {
        return $this->belongsTo(ModellingClassFeature::class, 'feature_id', 'feature_id');
    }

    public function value(): BelongsTo
    {
        return $this->belongsTo(Value::class);
    }
}
