<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $bill_id
 * @property string $item_type
 * @property int $item_id
 * @property int $quantity
 * @property string $unit_price
 * @property string $total_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bill $bill
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BillItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "bill_id",
        "item_type",
        "item_id",
        "quantity",
        "unit_price",
        "total_price",
    ];

    /**
     * Get the bill that owns the BillItem.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class);
    }
}
