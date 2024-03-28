<?php

namespace App\Models;

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
        'entity_id',
        'entity_type',
        'sort_nr',
        'feature_id',
        'value_id',
        'changecode',
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


}
