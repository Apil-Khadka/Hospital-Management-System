<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $prescription_id
 * @property int $medication_id
 * @property string $dosage
 * @property string $frequency
 * @property string $duration
 * @property string|null $instructions
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Medication $medication
 * @property-read \App\Models\Prescription $prescription
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail whereDosage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail whereInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail whereMedicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail wherePrescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrescriptionDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PrescriptionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "prescription_id",
        "medication_id",
        "dosage",
        "frequency",
        "duration",
        "instructions",
    ];

    /**
     * Get the prescription that owns the PrescriptionDetail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prescription(): BelongsTo
    {
        return $this->belongsTo(Prescription::class);
    }

    /**
     * Get the medication that owns the PrescriptionDetail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medication(): BelongsTo
    {
        return $this->belongsTo(Medication::class);
    }
}
