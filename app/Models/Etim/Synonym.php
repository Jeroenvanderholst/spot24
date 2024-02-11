<?php

namespace App\Models\Etim;

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
        'language_id',
        'description',
        'product_class_id',
        'modelling_class_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_class_id' => 'integer',
        'modelling_class_id' => 'integer',
    ];

    public function productClass(): BelongsTo
    {
        return $this->belongsTo(ProductClass::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function modellingClass(): BelongsTo
    {
        return $this->belongsTo(ModellingClass::class);
    }

    public function id(): BelongsTo
    {
        return $this->belongsTo(ProductClass::class);
    }
}
