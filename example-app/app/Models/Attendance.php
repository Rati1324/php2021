<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $class_id
 * @property int $lecturer_id
 * @property int $group_id
 * @property boolean $day
 * @property string $time
 * @property int $room_id
 */
class Attendance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'attendance';

    /**
     * @var array
     */
    protected $fillable = ['class_id', 'lecturer_id', 'group_id', 'day', 'time', 'room_id'];

}
