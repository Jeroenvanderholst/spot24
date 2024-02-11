<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Catalogue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catalogue_id',
        'catalogue_name',
        'version',
        'contract_reference_number',
        'catalogue_type',
        'change_reference_catalogue_version',
        'generation_date',
        'name_data_creator',
        'email_data_creator',
        'buyer_name',
        'buyer_id_gln',
        'buyer_id_duns',
        'datapool_name',
        'datapool_gln',
        'catalogue_validity_start',
        'catalogue_validity_end',
        'country',
        'language',
        'currency_code',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'catalogue_name' => 'array',
        'generation_date' => 'date',
        'catalogue_validity_start' => 'date',
        'catalogue_validity_end' => 'date',
    ];

    public function catalogueSuppliers(): HasMany
    {
        return $this->hasMany(CatalogueSupplier::class);
    }
}
