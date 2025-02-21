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
 * @property int $appointment_id
 * @property string $diagnosis
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Appointment $appointment
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\Patient|null $patient
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PrescriptionDetail> $prescriptiondetails
 * @property-read int|null $prescriptiondetails_count
 * @property-read \App\Models\Staff|null $staff
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prescription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prescription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prescription query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prescription whereAppointmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prescription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prescription whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prescription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prescription whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prescription whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ["appointment_id", "diagnosis", "notes"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<App\Models\Appointment, App\Models\Prescription>
     */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<App\Models\Patient, App\Models\Prescription>
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<App\Models\Staff, App\Models\Prescription>
     */
    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<App\Models\PrescriptionDetail, App\Models\Prescription>
     */
    public function prescriptiondetails(): HasMany
    {
        return $this->hasMany(PrescriptionDetail::class);
    }
}
