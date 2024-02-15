<?php

namespace App\Models\EtimXchange;

use App\Models\Etim\ModellingClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EtimModellingPort extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'etim_modelling_portcode',
        'etim_modelling_connection_type_code',
        'etim_modelling_connection_type_version',
        'etim_classification_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'etim_modelling_portcode' => 'integer',
        'etim_modelling_connection_type_version' => 'integer',
        'etim_classification_id' => 'integer',
    ];


    public function etimclassification(): BelongsTo
    {
        return $this->belongsTo(EtimClassification::class, 'product_id', 'product_id');
    }

    public function modellingclass(): BelongsTo
    {
        return $this->belongsTo(ModellingClass::class, 'etim_modelling_connection_type_code', 'modelling_class_id');
    }
}
