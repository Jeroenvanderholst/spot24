<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AllowanceSurcharge extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pricing_id',
        'allowance_surcharge_indicator',
        'allowance_surcharge_validity_date',
        'allowance_surcharge_type',
        'allowance_surcharge_amount',
        'allowance_surcharge_sequence_number',
        'allowance_surcharge_percentage',
        'allowance_surcharge_description',
        'allowance_surcharge_minimum_quantity',
        'price_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pricing_id' => 'integer',
        'allowance_surcharge_validity_date' => 'date',
        'allowance_surcharge_amount' => 'decimal:4',
        'allowance_surcharge_sequence_number' => 'integer',
        'allowance_surcharge_percentage' => 'decimal:3',
        'allowance_surcharge_description' => 'array',
        'allowance_surcharge_minimum_quantity' => 'decimal:4',
        'price_id' => 'integer',
    ];

    public function price(): BelongsTo
    {
        return $this->belongsTo(Price::class);
    }

    public function pricing(): BelongsTo
    {
        return $this->belongsTo(Price::class);
    }
}
