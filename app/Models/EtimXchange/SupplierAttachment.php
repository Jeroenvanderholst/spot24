<?php

namespace App\Models\EtimXchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupplierAttachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_id',
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
        'supplier_id' => 'integer',
        'attachment_language' => 'array',
        'attachment_type_specification' => 'array',
        'attachment_description' => 'array',
        'attachment_issue_date' => 'date',
        'attachment_expiry_date' => 'date',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
