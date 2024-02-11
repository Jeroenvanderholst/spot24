<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductAttachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'manufacturer_product_number',
        'attachment_type',
        'product_image_similar',
        'attachment_order',
        'attachment_language',
        'attachment_type_specification',
        'attachment_filename',
        'attachment_uri',
        'attachment_description',
        'attachment_issue_date',
        'attachment_expiry_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'product_image_similar' => 'boolean',
        'attachment_order' => 'integer',
        'attachment_language' => 'array',
        'attachment_type_specification' => 'array',
        'attachment_description' => 'array',
        'attachment_issue_date' => 'date',
        'attachment_expiry_date' => 'date',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
