<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Release extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
    ];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'id' => 'integer',

    ];

    // public function classRelease(): HasMany
    // {
    //     return $this->hasMany(ClassRelease::class);
    // }

    // public function productClass(): HasManyThrough
    // {
    //     return $this->hasManyThrough(ProductClass::class, ClassRelease::class);
    // }

    public function productClass(): BelongsToMany
    {
        return $this->belongsToMany(ProductClass::class, 'class_releases');
    }
}
