<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Fields extends Model
{

    protected $table = 'fields';

        /**
    * Prepare a date for array / JSON serialization.
    *
    * @param  \DateTimeInterface  $date
    * @return string
    */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['field_name'];
    
}
