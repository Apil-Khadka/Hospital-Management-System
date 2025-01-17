<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $lab_order_id
 * @property int $lab_test_id
 * @property string|null $result
 * @property string|null $result_date
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LabOrder $labOrder
 * @property-read \App\Models\LabTest $labTest
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail whereLabOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail whereLabTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail whereResultDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrderDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LabOrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "lab_order_id",
        "lab_test_id",
        "result",
        "result_date",
        "remarks",
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<App\Models\LabOrder, App\Models\LabOrderDetail>
     */
    public function labOrder(): BelongsTo
    {
        return $this->belongsTo(LabOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<App\Models\LabTest, App\Models\LabOrderDetail>
     */
    public function labTest(): BelongsTo
    {
        return $this->belongsTo(LabTest::class);
    }
}
