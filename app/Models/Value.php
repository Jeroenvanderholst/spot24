<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Value extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'deprecated',
    ];

    public $incrementing = false;
    public $keyType = 'string';
       
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'deprecated' => 'boolean',
    ];

    public function featureValues(): belongsToMany
    {
        return $this->belongsToMany(FeatureValue::class, 'feature_values');
    }

    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable', null ,'translatable_id', 'id');
    }
}
