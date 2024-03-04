<?php

namespace App\Models\Etim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'releases',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'sort_nr' => 'integer',
        'releases' => 'array',
    ];

    public function classFeatures(): HasMany
    {
        return $this->hasMany(ClassFeature::class);
    }

    public function modellingClassFeatures(): HasMany
    {
        return $this->hasMany(ModellingClassFeature::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(Translation::class);
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
