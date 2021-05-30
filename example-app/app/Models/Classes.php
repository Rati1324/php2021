<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $school_id
 * @property string $name
 * @property int $credit
 * @property int $code
 * @property School $school
 */
class Classes extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'class';

    /**
     * @var array
     */
    protected $fillable = ['school_id', 'name', 'credit', 'code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
