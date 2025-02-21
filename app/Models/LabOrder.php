<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int|null $appointment_id
 * @property string $status
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Appointment|null $appointment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LabOrderDetail> $details
 * @property-read int|null $details_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrder whereAppointmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrder whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LabOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LabOrder extends Model
{
    use HasFactory;

    protected $fillable = ["appointment_id", "status", "notes"];

    /**
     * Get the patient that owns the lab order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function patient(): BelongsTo
    // {
    //     return $this->belongsTo(Patient::class);
    // }

    /**
     * Get the staff that owns the lab order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function staff(): BelongsTo
    // {
    //     return $this->belongsTo(Staff::class);
    // }

    /**
     * Get the appointment that owns the lab order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    /**
     * Get the details for the lab order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details(): HasMany
    {
        return $this->hasMany(LabOrderDetail::class);
    }
}
