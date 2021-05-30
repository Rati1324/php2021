<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $day
 */
class Day extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'day_c';

    /**
     * @var array
     */
    protected $fillable = ['day'];

}
