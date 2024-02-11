<?php

namespace App\Models\Etim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModellingClass extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modelling_class_id',
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
        'modelling_group_id',
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
        'modelling_group_id' => 'integer',
    ];

    public function modellingClassFeatures(): HasMany
    {
        return $this->hasMany(ModellingClassFeature::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(Translation::class);
    }

    public function synonyms(): HasMany
    {
        return $this->hasMany(Synonym::class);
    }

    public function (): HasMany
    {
        return $this->hasMany(::class);
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
