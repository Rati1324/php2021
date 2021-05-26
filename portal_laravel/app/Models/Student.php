<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property int $school_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $pw
 * @property string $date of birth
 * @property int $year
 * @property int $semester
 * @property int $credits
 * @property float $fees
 * @property School $school
 * @property School $school
 */
class Student extends Authenticatable
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Student';

    /**
     * @var array
     */
    protected $fillable = ['school_id', 'first_name', 'last_name', 'email', 'phone', 'pw', 'date of birth', 'year', 'semester', 'credits', 'fees'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public $timestamps = false;
}
