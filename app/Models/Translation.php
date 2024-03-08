<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Translation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'translatable_id',
        'translatable_type',
        'language_id',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    public function translatable(): MorphTo
    {
        return $this->morphTo(); 
    }

    // public function productClass(): BelongsTo
    // {
    //     return $this->belongsTo(ProductClass::class, 'entity_id', 'class_id');
    // }

    // public function feature(): BelongsTo
    // {
    //     return $this->belongsTo(Feature::class, 'entity_id', 'id');
    // }

    // public function group(): BelongsTo
    // {
    //     return $this->belongsTo(Group::class);
    // }

    // public function modellingGroup(): BelongsTo
    // {
    //     return $this->belongsTo(ModellingGroup::class);
    // }


    // public function language(): BelongsTo
    // {
    //     return $this->belongsTo(EtimLanguage::class);
    // }

    // public function modellingClass(): BelongsTo
    // {
    //     return $this->belongsTo(ModellingClass::class);
    // }

    // public function value(): BelongsTo
    // {
    //     return $this->belongsTo(Value::class);
    // }

}
