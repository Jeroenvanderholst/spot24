<?php

namespace App\Models\Etim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassLink extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modelling_class_id',
        'modelling_class_version',
        'product_class_id',
        'product_class_version',
    ];

    // public $incrementing = false;
    // public $keyType = 'string';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'modelling_class_version' => 'integer',
        'product_class_version' => 'integer',
    ];

    public function modellingClass(): BelongsTo
    {
        return $this->belongsTo(ModellingClass::class);
    }

    public function productClass(): BelongsTo
    {
        return $this->belongsTo(ProductClass::class);
    }

    
}
