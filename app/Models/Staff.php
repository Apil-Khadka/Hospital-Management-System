<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $department_id
 * @property string|null $specialization
 * @property string|null $qualification
 * @property int|null $experience_years
 * @property string|null $license_number
 * @property string|null $date_of_birth
 * @property string|null $gender
 * @property string|null $phone_number
 * @property string|null $temporary_address
 * @property string|null $permanent_address
 * @property string $employment_status
 * @property string|null $shift_details
 * @property string|null $emergency_contact_name
 * @property string|null $emergency_contact_relationship
 * @property string|null $emergency_contact_phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Appointment> $appointments
 * @property-read int|null $appointments_count
 * @property-read \App\Models\Department $department
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LabOrder> $labOrders
 * @property-read int|null $lab_orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Prescription> $prescriptions
 * @property-read int|null $prescriptions_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereEmergencyContactName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereEmergencyContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereEmergencyContactRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereEmploymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereExperienceYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereLicenseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff wherePermanentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereShiftDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereSpecialization($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereTemporaryAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Staff whereUserId($value)
 * @mixin \Eloquent
 */
class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "department_id",
        "specialization",
        "qualification",
        "experience_years",
        "license_number",
        "date_of_birth",
        "gender",
        "phone_number",
        "temporary_address",
        "permanent_address",
        "employment_status",
        "shift_details",
        "emergency_contact_name",
        "emergency_contact_relationship",
        "emergency_contact_phone",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function labOrders()
    {
        return $this->hasMany(LabOrder::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}
