<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ProductClass extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_id',
        'status',
        'version',
        'mutation_date',
        'revision',
        'revision_date',
        'group_id',
        'description',
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
    ];

    public function classFeatures(): HasMany
    {
        return $this->hasMany(ClassFeature::class);
    }

    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable', null, 'translatable_id', 'class_id');
    }

    public function synonyms(): HasMany
    {
        return $this->hasMany(Synonym::class, 'entity_id', 'class_id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
