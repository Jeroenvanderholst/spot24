<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LcaDeclaration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lca_environmental_id',
        'life_cycle_stage',
        'lca_declaration_indicator',
        'declared_unit_gwp_total',
        'declared_unit_ap',
        'declared_unit_ep_freshwater',
        'declared_unit_ep_marine',
        'declared_unit_ep_terrestrial',
        'declared_unit_pocp',
        'declared_unit_odp',
        'declared_unit_adpe',
        'declared_unit_adpf',
        'declared_unit_wdp',
        'declared_unit_pert',
        'declared_unit_penrt',
        'column_17',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'declared_unit_gwp_total' => 'decimal:4',
        'declared_unit_ap' => 'decimal:4',
        'declared_unit_ep_freshwater' => 'decimal:4',
        'declared_unit_ep_marine' => 'decimal:4',
        'declared_unit_ep_terrestrial' => 'decimal:4',
        'declared_unit_pocp' => 'decimal:4',
        'declared_unit_odp' => 'decimal:4',
        'declared_unit_adpe' => 'decimal:4',
        'declared_unit_adpf' => 'decimal:4',
        'declared_unit_wdp' => 'decimal:4',
        'declared_unit_pert' => 'decimal:4',
        'declared_unit_penrt' => 'decimal:4',
        'column_17' => 'decimal:4',
    ];

    public function lcaEnvironmental(): BelongsTo
    {
        return $this->belongsTo(LcaEnvironmental::class);
    }
}
