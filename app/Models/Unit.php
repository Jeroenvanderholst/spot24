<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'description',
        'abbreviation',
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

    public function unitTranslations(): HasMany
    {
        return $this->hasMany(UnitTranslation::class);
    }

    public function classFeatures(): HasMany
    {
        return $this->hasMany(ClassFeature::class);
    }

    public function modellingClassFeatures(): HasMany
    {
        return $this->hasMany(ModellingClassFeature::class);
    }
}
