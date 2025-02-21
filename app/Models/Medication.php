<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 *
 *
 * @property int $id
 * @property string $generic_name
 * @property int $category_id
 * @property string|null $unit_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BillItem> $billItems
 * @property-read int|null $bill_items_count
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medication whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medication whereGenericName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medication whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Medication extends Model
{
    public $fillable = ["generic_name", "category_id", "unit_price"];

    public function billItems(): MorphMany
    {
        return $this->morphMany(BillItem::class, "billable")->chaperone();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
