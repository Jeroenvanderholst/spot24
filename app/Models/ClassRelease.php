<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassRelease extends Model
{
    use HasFactory;

         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_class_id',
        'release_id',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_class_id' => 'integer',
        'release_id' => 'integer',

    ];

    public function release(): belongsTo
    {
        return $this->belongsTo(Release::class);
    }

    public function productClass(): belongsTo
    {
        return $this->belongsTo(ProductClass::class);
    }
}
