<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModellingGroup extends Model
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

    public function modellingClasses(): HasMany
    {
        return $this->hasMany(ModellingClass::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(Translation::class);
    }
}
