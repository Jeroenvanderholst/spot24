<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EtimLanguage extends Model
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
        'created_at',
        'updated_at'
    ];

    public $incrementing = false;
    public $keyType = 'string';

    public function synonyms(): HasMany
    {
        return $this->hasMany(Synonym::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(Translation::class);
    }

    public function unitTranslations(): HasMany
    {
        return $this->hasMany(UnitTranslation::class);
    }
}
