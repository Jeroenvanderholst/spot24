<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Feature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
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

    public function productClasses(): BelongsToMany
    {
        return $this->belongsToMany(ProductClass::class, 'featurable', 'class_features', 'class_type', 'class_id');
    }



    public function modellingClasses(): HasMany
    {
        return $this->hasMany(ModellingClassFeature::class);
    }

    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable', null ,'translatable_id', 'id');
    }

    public function id(): BelongsTo
    {
        return $this->belongsTo(Translation::class);
    }
}
