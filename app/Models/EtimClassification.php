<?php

namespace App\Models;

use App\Models\ModellingClass;
use App\Models\ProductClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EtimClassification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'manufacturer_product_nr',
        'etim_release_version',
        'etim_dynamic_release_date',
        'etim_class_id',
        'etim_class_version',
        'etim_modelling_class_id',
        'etim_modelling_class_version',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'etim_dynamic_release_date' => 'date',
        'etim_class_version' => 'integer',
        'etim_modelling_class_version' => 'integer',
    ];

    public function etimFeatures(): HasMany
    {
        return $this->hasMany(EtimFeature::class);
    }

    public function etimModellingPorts(): HasMany
    {
        return $this->hasMany(EtimModellingPort::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productclass(): BelongsTo
    {
        return $this->belongsTo(ProductClass::class, 'etim_class_id', 'class_id');
    }

    public function modellingclass(): BelongsTo
    {
        return $this->belongsTo(ModellingClass::class, 'etim_modelling_class_id', 'modelling_class_id');
    }
}
