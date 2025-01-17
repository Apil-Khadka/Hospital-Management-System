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
 * @property int $patient_id
 * @property int|null $appointment_id
 * @property string $total_amount
 * @property string $paid_amount
 * @property string $status
 * @property string|null $payment_method
 * @property string|null $insurance_provider
 * @property string|null $insurance_policy_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Appointment|null $appointment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BillItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill whereAppointmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill whereInsurancePolicyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill whereInsuranceProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        "patient_id",
        "appointment_id",
        "total_amount",
        "paid_amount",
        "status",
        "payment_method",
        "insurance_provider",
        "insurance_policy_number",
    ];

    /**
     * Get the patient that owns the bill.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get the appointment that owns the bill.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    /**
     * Get the items for the bill.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(BillItem::class);
    }
}
