<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ClassFeature extends Model
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
        'unit_id',
        'imp_unit_id',
        'changecode',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'sort_nr' => 'integer',
    ];

    public function featureValues(): HasMany
    {
        return $this->hasMany(FeatureValue::class);
    }

    public function modellingClassFeatures(): HasMany
    {
        return $this->hasMany(ModellingClassFeature::class);
    }

    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable', null ,'translatable_id', 'id');
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(ProductClass::class);
    }

    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function impUnit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
