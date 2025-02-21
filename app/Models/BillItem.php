<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 *
 *
 * @property int $id
 * @property int $bill_id
 * @property string $billable_type
 * @property int $billable_id
 * @property int $quantity
 * @property string $unit_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bill $bill
 * @property-read Model|\Eloquent $billable
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereBillableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereBillableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BillItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "bill_id",
        "billable_id",
        "billable_type",
        "quantity",
        "status",
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
    public function billable(): MorphTo
    {
        return $this->morphTo();
    }
}
