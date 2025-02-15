<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $normal_range
 * @property string|null $unit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LabOrderDetail> $labOrderDetails
 * @property-read int|null $lab_order_details_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabTest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabTest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabTest query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabTest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabTest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabTest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabTest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabTest whereNormalRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabTest whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabTest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LabTest extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "normal_range", "unit"];

    /**
     * Get the lab order details for the lab test.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<App\Models\LabOrderDetail, App\Models\LabTest>
     */
    public function labOrderDetails(): HasMany
    {
        return $this->hasMany(LabOrderDetail::class);
    }
}
