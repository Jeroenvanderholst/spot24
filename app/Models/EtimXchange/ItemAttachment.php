<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemAttachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trade_item_id',
        'supplier_item_number',
        'attachment_type',
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
        'trade_item_id' => 'integer',
        'attachment_language' => 'array',
        'attachment_type_specification' => 'array',
        'attachment_description' => 'array',
        'attachment_issue_date' => 'date',
        'attachment_expiry_date' => 'date',
    ];

    public function tradeItem(): BelongsTo
    {
        return $this->belongsTo(TradeItem::class);
    }

}
