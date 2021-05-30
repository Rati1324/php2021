<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $type_id
 * @property string $name
 * @property School[] $schools
 */
class SchoolType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'school_type';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'type_id';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schools()
    {
        return $this->hasMany('App\School', 'type_id', 'type_id');
    }
}
