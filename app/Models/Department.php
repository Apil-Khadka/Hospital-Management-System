<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, \App\Models\Appointment> $appointments
 * @property-read int|null $appointments_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read Collection<int, \App\Models\Staff> $staff
 * @property-read int|null $staff_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Department extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description"];

    public int $id;
    public string $name;
    public string|null $description;
    /**
     * @var Illuminate\Support\Carbon|null
     */
    public Carbon|null $created_at;
    /**
     * @var Illuminate\Support\Carbon|null
     */
    public Carbon|null $updated_at;
    /**
     * @var Illuminate\Database\Eloquent\Collection<int,App\Models\Appointment>
     */
    public Collection $appointments;
    public int|null $appointments_count;
    /**
     * @var Illuminate\Database\Eloquent\Collection<int,App\Models\Staff>
     */
    public Collection $staff;
    public int|null $staff_count;
    /**
     * @return HasMany<Staff,Department>
     */
    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class);
    }
    /**
     * @return HasMany<Appointment,Department>
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
