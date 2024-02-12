<?php

namespace App\Models\Etim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Translation extends Model
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

    public function productClass(): BelongsTo
    {
        return $this->belongsTo(ProductClass::class);
    }

    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(EtimLanguage::class);
    }

    public function modellingClass(): BelongsTo
    {
        return $this->belongsTo(ModellingClass::class);
    }

    public function value(): BelongsTo
    {
        return $this->belongsTo(Value::class);
    }

    public function id(): BelongsTo
    {
        return $this->belongsTo(ProductClass::class);
    }
}
