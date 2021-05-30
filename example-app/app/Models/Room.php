<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $number
 * @property int $capacity
 */
class Room extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'room';

    /**
     * @var array
     */
    protected $fillable = ['number', 'capacity'];

}
