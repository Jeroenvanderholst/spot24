<?php

namespace App\Models\Etim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModellingClassFeature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modellingclass_id',
        'sort_nr',
        'feature_id',
        'port_code',
        'drawing_code',
        'unit_id',
        'imp_unit_id',
        'modelling_class_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'sort_nr' => 'integer',
        'port_code' => 'integer',
        'unit_id' => 'integer',
        'modelling_class_id' => 'integer',
    ];

    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }

    public function modellingClass(): BelongsTo
    {
        return $this->belongsTo(ModellingClass::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}