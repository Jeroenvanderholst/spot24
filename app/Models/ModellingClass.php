<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ModellingClass extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'version',
        'status',
        'mutation_date',
        'revision',
        'revision_date',
        'modelling',
        'description',
        'group_id',
        'drawing_uri',
        'changecode',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'version' => 'integer',
        'mutation_date' => 'date',
        'revision' => 'integer',
        'revision_date' => 'date',
        'modelling' => 'boolean',
        ];

    public function modellingClassFeatures(): HasMany
    {
        return $this->hasMany(ModellingClassFeature::class);
    }

    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable', null, 'translatable_id', 'id');
    }

    public function synonyms(): HasMany
    {
        return $this->hasMany(Synonym::class, 'entity_id', 'modelling_class_id');
    }

    public function modellingClassPort(): HasMany
    {
        return $this->hasMany(ModellingClassPort::class);
    }

    public function modellingGroup(): BelongsTo
    {
        return $this->belongsTo(ModellingGroup::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(ModellingGroup::class);
    }
}
