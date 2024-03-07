<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TradeItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'supplier_item_number',
        'manufacturer_product_nr',
        'supplier_alt_item_number',
        'manufacturer_item_number',
        'item_gtin',
        'buyer_item_number',
        'discount_group_id',
        'discount_group_description',
        'bonus_group_id',
        'bonus_group_description',
        'item_validity_date',
        'item_obslescence_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'item_gtin' => 'array',
        'discount_group_description' => 'array',
        'bonus_group_description' => 'array',
        'item_validity_date' => 'date',
        'item_obslescence_date' => 'date',
    ];

    public function itemDetail(): HasOne
    {
        return $this->hasOne(ItemDetail::class);
    }

    public function itemLogisticDetail(): HasOne
    {
        return $this->hasOne(ItemLogisticDetail::class);
    }

    public function ordering(): HasOne
    {
        return $this->hasOne(Ordering::class);
    }

    public function itemAttachments(): HasMany
    {
        return $this->hasMany(ItemAttachment::class);
    }

    public function itemCountrySpecificFields(): HasMany
    {
        return $this->hasMany(ItemCountrySpecificField::class);
    }

    public function itemDescriptions(): HasMany
    {
        return $this->hasMany(ItemDescription::class);
    }

    public function itemRelations(): HasMany
    {
        return $this->hasMany(ItemRelation::class);
    }

    public function packagingIdentifications(): HasMany
    {
        return $this->hasMany(PackagingIdentification::class);
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
