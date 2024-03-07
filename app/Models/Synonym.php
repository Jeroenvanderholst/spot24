<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Synonym extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entity_id',
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


    public function language(): BelongsTo
    {
        return $this->belongsTo(EtimLanguage::class);
    }

    public function productClass(): BelongsTo
    {
        return $this->belongsTo(ProductClass::class);
    }

    public function modellingClass(): BelongsTo
    {
        return $this->belongsTo(ModellingClass::class);
    }
}
