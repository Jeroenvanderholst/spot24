<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModellingClassPort extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modelling_class_id',
        'port_code',
        'connection_type_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'port_code' => 'integer',
    ];

    public function featureValues(): HasMany
    {
        return $this->hasMany(FeatureValue::class);
    }

    public function modellingClass(): BelongsTo
    {
        return $this->belongsTo(ModellingClass::class);
    }

    public function connectionType(): BelongsTo
    {
        return $this->belongsTo(ModellingClass::class);
    }
}
