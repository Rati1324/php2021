<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property int $school_id
 */
class Lecturer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lecturer';

    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'school_id'];

}
