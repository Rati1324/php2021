<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $type_id
 * @property string $name
 * @property float $tuition
 * @property SchoolType $schoolType
 * @property Class[] $classes
 * @property SGroup[] $sGroups
 */
class School extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'school';

    /**
     * @var array
     */
    protected $fillable = ['type_id', 'name', 'tuition'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schoolType()
    {
        return $this->belongsTo('App\SchoolType', 'type_id', 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classes()
    {
        return $this->hasMany('App\Class');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sGroups()
    {
        return $this->hasMany('App\SGroup');
    }
}
