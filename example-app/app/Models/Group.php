<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $school_id
 * @property string $code
 * @property School $school
 */
class Group extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 's_group';

    /**
     * @var array
     */
    protected $fillable = ['school_id', 'code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
