<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $student_id
 * @property int $attendance_id
 */
class StudentAtten extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'student_atten';

    /**
     * @var array
     */
    protected $fillable = [];

}
