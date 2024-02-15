<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_id',
        'manufacturer_name',
        'manufacturer_shortname',
        'manufacturer_product_number',
        'manufacturer_product_gtin',
        'unbranded_product',
        'brand_name',
        'brand_series',
        'brand_series_variation',
        'product_validity_date',
        'product_obsolescence_date',
        'discount_group_id',
        'discount_group_description',
        'bonus_group_id',
        'bonus_group_description',
        'customs_commodity_code',
        'factor_customs_commodity_codedecimal(15,4)',
        'country_of_origin',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'supplier_id' => 'integer',
        'unbranded_product' => 'boolean',
        'brand_series' => 'array',
        'product_validity_date' => 'date',
        'product_obsolescence_date' => 'date',
        'bonus_group_description' => 'array',
        'factor_customs_commodity_codedecimal(15,4)' => 'decimal:4',
    ];

    public function legislation(): HasOne
    {
        return $this->hasOne(Legislation::class);
    }

    public function lcaEnvironmental(): HasOne
    {
        return $this->hasOne(LcaEnvironmental::class);
    }

    public function productDetail(): HasOne
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function etimClassifications(): HasMany
    {
        return $this->hasMany(EtimClassification::class);
    }

    public function otherClassifications(): HasMany
    {
        return $this->hasMany(OtherClassification::class);
    }

    public function productAttachments(): HasMany
    {
        return $this->hasMany(ProductAttachment::class);
    }

    public function productCountrySpecificFields(): HasMany
    {
        return $this->hasMany(ProductCountrySpecificField::class);
    }

    public function productDescriptions(): HasMany
    {
        return $this->hasMany(ProductDescription::class);
    }

    public function productRelations(): HasMany
    {
        return $this->hasMany(ProductRelation::class);
    }

    public function tradeItems(): HasMany
    {
        return $this->hasMany(TradeItem::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
