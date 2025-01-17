<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int $patient_id
 * @property int $staff_id
 * @property int $department_id
 * @property string $appointment_date
 * @property string $appointment_time
 * @property string $status
 * @property string $type
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department $department
 * @property-read \App\Models\Patient $patient
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Prescription> $prescriptions
 * @property-read int|null $prescriptions_count
 * @property-read \App\Models\Staff $staff
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereAppointmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereAppointmentTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereStaffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Appointment extends Model
{
    protected $fillable = [
        "patient_id",
        "staff_id",
        "department_id",
        "appointment_date",
        "appointment_time",
        "status",
        "type",
        "notes",
    ];

    /**
     * Get the patient that owns the appointment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<App\Models\Patient, App\Models\Appointment>
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get the staff that owns the appointment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<App\Models\Staff, App\Models\Appointment>
     */
    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Get the department that owns the appointment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<App\Models\Department, App\Models\Appointment>
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the prescriptions for the appointment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<App\Models\Prescription, App\Models\Appointment>
     */
    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }
}
